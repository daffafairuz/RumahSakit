<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HargaResource\Pages;
use App\Filament\Resources\HargaResource\RelationManagers;
use App\Models\Harga;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HargaResource extends Resource
{
    protected static ?string $model = Harga::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255)
                    ->label('Name')
                    ->placeholder('Enter name'),
                TextInput::make('min')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->label('Harga Minimal')
                    ->placeholder('Enter min value'),
                TextInput::make('max')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->label('Harga Maximal')
                    ->placeholder('Enter max value'),
                Toggle::make('is_active')
                    ->default(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name'),

                TextColumn::make('min')
                    ->label('Min'),

                TextColumn::make('max')
                    ->label('Max'),

                IconColumn::make('is_active')
                    ->label('Is Active')
                    ->trueIcon('heroicon-s-check')
                    ->falseIcon('heroicon-s-x-circle'),
                    ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHargas::route('/'),
            'create' => Pages\CreateHarga::route('/create'),
            'edit' => Pages\EditHarga::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
