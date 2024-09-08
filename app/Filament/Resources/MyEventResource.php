<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MyEventResource\Pages;
use App\Filament\Resources\MyEventResource\RelationManagers;
use App\Models\MyEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MyEventResource extends Resource
{
    protected static ?string $model = MyEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título del Evento')
                    ->required(),
                Forms\Components\DateTimePicker::make('start')
                    ->label('Fecha y Hora de Inicio')
                    ->required(),
                Forms\Components\DateTimePicker::make('end')
                    ->label('Fecha y Hora de Fin')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Título del Evento'),
                Tables\Columns\TextColumn::make('start')->label('Fecha y Hora de Inicio'),
                Tables\Columns\TextColumn::make('end')->label('Fecha y Hora de Fin'),
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
            'index' => Pages\ListMyEvents::route('/'),
            'create' => Pages\CreateMyEvent::route('/create'),
            'edit' => Pages\EditMyEvent::route('/{record}/edit'),
        ];
    }
}
