<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->directory('cities')
                    ->visibility('public')
                    ->required()
                    ->columnSpan(2),
                TextInput::make('name')
                    ->required()
                    ->live(debounce: 500) //debounce berfungsi untuk memberikan delay tidak langsung menjalankan fungsi reactive
                    ->afterStateUpdated(function ($state, callable $set){
                        $set('slug', Str::slug($state));
                    }), //ketika field nama diupdate maka akan ada fungsi untuk merubah input yang ada pada bagian slug sesuai dengan yang ada pada name
                TextInput::make('slug')
                    ->required(),
            ]);
    }
}
