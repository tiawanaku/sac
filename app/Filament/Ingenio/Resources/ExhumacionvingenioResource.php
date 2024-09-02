<?php

namespace App\Filament\Ingenio\Resources;

use App\Filament\Ingenio\Resources\ExhumacionvingenioResource\Pages;
use App\Filament\Ingenio\Resources\ExhumacionvingenioResource\RelationManagers;
use App\Models\Exhumacionvingenio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExhumacionvingenioResource extends Resource
{
    protected static ?string $model = Exhumacionvingenio::class;

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
            'index' => Pages\ListExhumacionvingenios::route('/'),
            'create' => Pages\CreateExhumacionvingenio::route('/create'),
            'edit' => Pages\EditExhumacionvingenio::route('/{record}/edit'),
        ];
    }
}
