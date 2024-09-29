<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WeatherResource\Pages;
use App\Models\Weather;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Http;

class WeatherResource extends Resource
{
    protected static ?string $model = Weather::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->label('City Name'),

                Forms\Components\TextInput::make('temperature')
                    ->required()
                    ->label('Temperature (°C)')
                    ->numeric(),

                Forms\Components\TextInput::make('description')
                    ->required()
                    ->label('Weather Description'),

                Forms\Components\TextInput::make('humidity')
                    ->required()
                    ->label('Humidity (%)')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city')
                    ->label('City'),

                Tables\Columns\TextColumn::make('temperature')
                    ->label('Temperature (°C)')
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Weather'),

                Tables\Columns\TextColumn::make('humidity')
                    ->label('Humidity (%)')
                    ->sortable(),
            ])
            ->filters([
                // Filtreler eklenebilir
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // İlişkiler buraya eklenebilir
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWeather::route('/'),
            'create' => Pages\CreateWeather::route('/create'),
            'edit' => Pages\EditWeather::route('/{record}/edit'),
        ];
    }

    // API'den hava durumu verilerini almak için eklenebilir:
    public static function getWeatherData($city)
    {
        $apiKey = env('WEATHER_API_KEY');
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
