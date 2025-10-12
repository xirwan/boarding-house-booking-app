<?php

namespace App\Filament\Resources\Transactions\Schemas;

use App\Models\BoardingHouse;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                Select::make('boarding_house_id')
                    ->relationship('boardingHouse', 'name')
                    ->required(),
                Select::make('room_id')
                    ->relationship('room', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email() //email() digunakan untuk menerima input dalam format email seperti menggunakan tanda @
                    ->required(),
                TextInput::make('phone_number')
                    ->tel()
                    ->telRegex('/^(?:\+62|62|0)[2-9]\d{7,11}$/')
                    ->required(),
                Select::make('payment_method')
                    ->options([
                        'down_payment' => 'Down payment',
                        'full_payment' => 'Full payment',
                    ])
                    ->required(),
                TextInput::make('payment_status')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                TextInput::make('duration')
                    ->numeric()
                    ->required(),
                TextInput::make('total_amount')
                    ->numeric()
                    ->prefix('IDR')
                    ->required(),
                DatePicker::make('transaction_date')
                    ->required(),
            ]);
    }
}
