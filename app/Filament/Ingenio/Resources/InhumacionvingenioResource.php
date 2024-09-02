<?php

namespace App\Filament\Ingenio\Resources;

use App\Filament\Ingenio\Resources\InhumacionvingenioResource\Pages;
use App\Filament\Ingenio\Resources\InhumacionvingenioResource\RelationManagers;
use App\Models\Inhumacionvingenio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InhumacionvingenioResource extends Resource
{
    protected static ?string $model = Inhumacionvingenio::class;

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
            'index' => Pages\ListInhumacionvingenios::route('/'),
            'create' => Pages\CreateInhumacionvingenio::route('/create'),
            'edit' => Pages\EditInhumacionvingenio::route('/{record}/edit'),
        ];
    }
}
