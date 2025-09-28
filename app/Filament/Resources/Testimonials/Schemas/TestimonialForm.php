<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('photo')
                    ->image()
                    ->directory('testimonials')
                    ->required()
                    ->columnSpan(2),
                Select::make('boarding_house_id')
                    ->relationship('boardingHouse', 'name')
                    ->required()
                    ->columnSpan(2),
                TextInput::make('name')
                    ->required(),
                TextInput::make('rating')
                    ->numeric()
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpan(2),
            ]);
    }
}
