<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RenovacionResource\Pages;
use App\Filament\Resources\RenovacionResource\RelationManagers;
use App\Models\Renovacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RenovacionResource extends Resource
{
    protected static ?string $model = Renovacion::class;
    protected static ?string $navigationLabel = 'Renovaciones';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Servicios';
    protected static ?string $activeNavigationIcon = 'heroicon-o-clipboard-document-check';
    public static function getNavigationBadge(): ?string
    {
         return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ci_nit')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nombre_contribuyente')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('numero_casa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('zona')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('difunto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('monto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_renovacion')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_vencimiento')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ci_nit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre_contribuyente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_casa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zona')
                    ->searchable(),
                Tables\Columns\TextColumn::make('difunto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('monto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_renovacion')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_vencimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListRenovacions::route('/'),
            'create' => Pages\CreateRenovacion::route('/create'),
            'edit' => Pages\EditRenovacion::route('/{record}/edit'),
        ];
    }
}
