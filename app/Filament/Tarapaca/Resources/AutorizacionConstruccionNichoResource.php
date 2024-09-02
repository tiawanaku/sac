<?php

namespace App\Filament\Tarapaca\Resources;

use App\Filament\Tarapaca\Resources\AutorizacionConstruccionNichoResource\Pages;
use App\Filament\Tarapaca\Resources\AutorizacionConstruccionNichoResource\RelationManagers;
use App\Models\AutorizacionConstruccionNicho;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AutorizacionConstruccionNichoResource extends Resource
{
    protected static ?string $model = AutorizacionConstruccionNicho::class;

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
            'index' => Pages\ListAutorizacionConstruccionNichos::route('/'),
            'create' => Pages\CreateAutorizacionConstruccionNicho::route('/create'),
            'edit' => Pages\EditAutorizacionConstruccionNicho::route('/{record}/edit'),
        ];
    }
}
