<?php

namespace App\Filament\Resources\BoardingHouses\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Actions\CreateAction;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Support\Str;

class BoardingHouseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('General Information')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->directory('boarding_house')
                                    ->visibility('public')
                                    ->required(),
                                TextInput::make('name')
                                    ->required()
                                    ->live(debounce: 500)
                                    ->afterStateUpdated(function ($state, callable $set){
                                        $set('slug', Str::slug($state));
                                    }),
                                TextInput::make('slug')
                                    ->required(),
                                Select::make('city_id')
                                    ->relationship('city', 'name') //relationship merupakan fungsi yang mengambil hubungan yang dimiliki oleh model, ('city') merupakan nama fungsi yang terdapat pada model BoardingHouse dengan name saja yang diambil
                                    ->required(),
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required(),
                                RichEditor::make('description')
                                    ->required(),
                                TextInput::make('price')
                                    ->numeric()
                                    ->prefix('IDR') //fungsi prefix adaah menampilkan label (kata) pada tampilan sebelum kata yang diinput
                                    ->required(),
                                Textarea::make('address')
                                    ->required(),
                            ]),
                        Tab::make('Bonus')
                            ->schema([
                                Repeater::make('bonuses')
                                    ->relationship('bonuses') //('bonuses') diambil dari nama fungsi relasi yang ada pada model BoardingHouses
                                    ->schema([
                                        FileUpload::make('image')
                                            ->image()
                                            ->directory('bonuses')
                                            ->visibility('public')
                                            ->required(),
                                        TextInput::make('name')
                                            ->required(),
                                        TextArea::make('description')
                                            ->required(),
                                    ])
                            ]),
                        Tab::make('Room')
                            ->schema([
                                Repeater::make('rooms')
                                    ->relationship('rooms')
                                    ->schema([
                                        TextInput::make('name')
                                            ->required(),
                                        TextInput::make('room_type')
                                            ->required(),
                                        TextInput::make('square_feet')
                                            ->numeric()
                                            ->postfix('m²')
                                            ->required(),
                                        TextInput::make('capacity')
                                            ->numeric()
                                            ->required(),
                                        TextInput::make('price_per_month')
                                            ->numeric()
                                            ->prefix('IDR')
                                            ->required(),
                                        Toggle::make('is_available')
                                            ->required(),
                                        Repeater::make('images')
                                            ->relationship('images')
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->image()
                                                    ->directory('rooms')
                                                    ->visibility('public')
                                                    ->required(),
                                            ])
                                    ])
                            ]),
                ])->columnSpan(2),
            ]);
    }
}
