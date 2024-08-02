<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExhumacionResource\Pages;
use App\Filament\Resources\ExhumacionResource\RelationManagers;
use App\Models\Exhumacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExhumacionResource extends Resource
{
    protected static ?string $model = Exhumacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('motivo_exhumacion')
                    ->label('Motivo de Exhumación')
                    ->required(),
                Forms\Components\TextInput::make('costo_formulario')
                    ->label('Costo de Formulario')
                    ->required(),
                Forms\Components\TextInput::make('costo_servicio')
                    ->label('Costo del Servicio')
                    ->required(),
                Forms\Components\TextInput::make('costo_total')
                    ->label('Costo Total')
                    ->required(),
                Forms\Components\DateTimePicker::make('fecha_exhumacion'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('motivo_exhumacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('costo_formulario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('costo_servicio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('costo_total')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_exhumacion')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListExhumacions::route('/'),
            'create' => Pages\CreateExhumacion::route('/create'),
            'edit' => Pages\EditExhumacion::route('/{record}/edit'),
        ];
    }
}