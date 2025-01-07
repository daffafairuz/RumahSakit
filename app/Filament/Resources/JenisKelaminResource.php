<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisKelaminResource\Pages;
use App\Filament\Resources\JenisKelaminResource\RelationManagers;
use App\Models\JenisKelamin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisKelaminResource extends Resource
{
    protected static ?string $model = JenisKelamin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListJenisKelamins::route('/'),
            'create' => Pages\CreateJenisKelamin::route('/create'),
            'edit' => Pages\EditJenisKelamin::route('/{record}/edit'),
        ];
    }
}
