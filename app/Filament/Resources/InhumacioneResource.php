<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InhumacioneResource\Pages;
use App\Filament\Resources\InhumacioneResource\RelationManagers;
use App\Models\Inhumacione;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InhumacioneResource extends Resource
{
    protected static ?string $model = Inhumacione::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('Información del Difunto')
                ->schema([
                    Forms\Components\TextInput::make('nombre_difunto')
                        ->label('Nombre Difunto')
                        ->required(),
    
                    Forms\Components\Select::make('sexo')
                        ->label('Sexo')
                        ->options([
                            'masculino' => 'Masculino',
                            'femenino' => 'Femenino',
                        ])
                        ->required(),
    
                    Forms\Components\TextInput::make('edad')
                        ->label('Edad')
                        ->required()
                        ->numeric(),
    
                    Forms\Components\Select::make('estado_civil')
                        ->label('Estado Civil')
                        ->options([
                            'soltero' => 'Soltero(a)',
                            'casado' => 'Casado(a)',
                            'divorciado' => 'Divorciado(a)',
                            'viudo' => 'Viudo(a)',
                        ])
                        ->required(),
    
                    Forms\Components\TextInput::make('nacionalidad')
                        ->label('Nacionalidad')
                        ->required(),
    
                    Forms\Components\TextInput::make('diagnostico_fallecimiento')
                        ->label('Diagnóstico Fallecimiento')
                        ->required(),
    
                    Forms\Components\TextInput::make('medico')
                        ->label('Médico')
                        ->required(),
    
                    Forms\Components\TextInput::make('orc')
                        ->label('ORC')
                        ->required(),
    
                    Forms\Components\TextInput::make('libro')
                        ->label('Libro')
                        ->required(),
    
                    Forms\Components\TextInput::make('folio')
                        ->label('Folio')
                        ->required(),
    
                    Forms\Components\DatePicker::make('fecha_inhumacion')
                        ->label('Fecha Inhumación')
                        ->required(),
    
                    Forms\Components\DatePicker::make('fecha_vencimiento')
                        ->label('Fecha Vencimiento')
                        ->required(),
    
                    Forms\Components\TextInput::make('dia')
                        ->label('Día')
                        ->required(),
    
                    Forms\Components\Textarea::make('descripcion_nicho')
                        ->label('Descripción de Nicho')
                        ->required(),
                    Forms\Components\Select::make('ubicacion')
                        ->searchable()
                        ->relationship('ubicacion', 'nombre')
                        ->createOptionForm([
                            Forms\Components\TextInput::make('fila')
                                    ->label('ingrese el numero de fila')
                                    ->required()
                                    ->maxLength(255),
                            Forms\Components\TextInput::make('columna')
                                    ->label('ingrese el numero de columna')
                                    ->required()
                                    ->maxLength(255),
                        ])
                        ->relationship('ubicacion', 'nombre')
                ]),
    
            Forms\Components\Section::make('Información del Solicitante')
                ->schema([
                    Forms\Components\TextInput::make('nombre_apellido_solicitante')
                        ->label('Nombre y Apellido del Solicitante')
                        ->required(),
    
                    Forms\Components\TextInput::make('carnet_identidad')
                        ->label('Carnet Identidad')
                        ->required(),
    
                    Forms\Components\TextInput::make('celular')
                        ->label('Celular')
                        ->required()
                        ->numeric(),
    
                    Forms\Components\TextInput::make('direccion')
                        ->label('Dirección')
                        ->required(),
    
                    Forms\Components\TextInput::make('numero')
                        ->label('Número')
                        ->required(),
    
                    Forms\Components\TextInput::make('zona')
                        ->label('Zona')
                        ->required(),
                ]),
        ]);
    
    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_difunto')
                ->label('Nombre Difunto')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('nombre_apellido_solicitante')
                ->label('Nombre y Apellido del Solicitante')
                ->sortable()
                ->searchable(),
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
            'index' => Pages\ListInhumaciones::route('/'),
            'create' => Pages\CreateInhumacione::route('/create'),
            'edit' => Pages\EditInhumacione::route('/{record}/edit'),
        ];
    }
}
