<?php

namespace App\Filament\Ingenio\Resources;

use App\Filament\Ingenio\Resources\AutorizacionConstruccionNichovingenioResource\Pages;
use App\Filament\Ingenio\Resources\AutorizacionConstruccionNichovingenioResource\RelationManagers;
use App\Models\AutorizacionConstruccionNichovingenio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AutorizacionConstruccionNichovingenioResource extends Resource
{
    protected static ?string $model = AutorizacionConstruccionNichovingenio::class;

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
            'index' => Pages\ListAutorizacionConstruccionNichovingenios::route('/'),
            'create' => Pages\CreateAutorizacionConstruccionNichovingenio::route('/create'),
            'edit' => Pages\EditAutorizacionConstruccionNichovingenio::route('/{record}/edit'),
        ];
    }
}
