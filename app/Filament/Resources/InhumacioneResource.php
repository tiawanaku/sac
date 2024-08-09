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
use Filament\Forms\Components\Wizard;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;


class InhumacioneResource extends Resource
{
    protected static ?string $model = Inhumacione::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Wizard::make([
                Wizard\Step::make('Información del Difunto')
                    ->schema([
                        TextInput::make('nombre_difunto')
                            ->label('Nombre Difunto')
                            ->required(),
                
                        Select::make('sexo')
                            ->label('Sexo')
                            ->options([
                                'masculino' => 'Masculino',
                                'femenino' => 'Femenino',
                            ])
                            ->required(),
                
                        TextInput::make('edad')
                            ->label('Edad')
                            ->required()
                            ->numeric(),
                
                        Select::make('estado_civil')
                            ->label('Estado Civil')
                            ->options([
                                'soltero' => 'Soltero(a)',
                                'casado' => 'Casado(a)',
                                'divorciado' => 'Divorciado(a)',
                                'viudo' => 'Viudo(a)',
                            ])
                            ->required(),
                
                        TextInput::make('nacionalidad')
                            ->label('Nacionalidad')
                            ->required(),
                
                        TextInput::make('diagnostico_fallecimiento')
                            ->label('Diagnóstico Fallecimiento')
                            ->required(),
                
                        TextInput::make('medico')
                            ->label('Médico')
                            ->required(),
                
                        TextInput::make('orc')
                            ->label('ORC')
                            ->required(),
                
                        TextInput::make('libro')
                            ->label('Libro')
                            ->required(),
                
                        TextInput::make('folio')
                            ->label('Folio')
                            ->required(),
                
                        DatePicker::make('fecha_inhumacion')
                            ->label('Fecha Inhumación')
                            ->required(),
                
                        DatePicker::make('fecha_vencimiento')
                            ->label('Fecha Vencimiento')
                            ->required(),
                
                        TextInput::make('dia')
                            ->label('Día')
                            ->required(),
                
                        Textarea::make('descripcion_nicho')
                            ->label('Descripción de Nicho')
                            ->required(),
                    ]),
                
                Wizard\Step::make('Ubicación')
                    ->schema([
                        TextInput::make('fila_ubicacion')
                            ->label('Fila Ubicación')
                            ->required()
                            ->maxLength(255),
                
                        TextInput::make('sector_ubicacion')
                            ->label('Sector Ubicación')
                            ->required()
                            ->maxLength(255),
                
                        TextInput::make('nro_ubicacion')
                            ->label('Número Ubicación')
                            ->required()
                            ->maxLength(255),
                    ]),
                
                Wizard\Step::make('Información del Solicitante')
                    ->schema([
                        TextInput::make('nombre_apellido_solicitante')
                            ->label('Nombre y Apellido del Solicitante')
                            ->required(),
                
                        TextInput::make('carnet_identidad')
                            ->label('Carnet Identidad')
                            ->required(),
                
                        TextInput::make('celular')
                            ->label('Celular')
                            ->required()
                            ->numeric(),
                
                        TextInput::make('direccion')
                            ->label('Dirección')
                            ->required(),
                
                        TextInput::make('numero')
                            ->label('Número')
                            ->required(),
                
                        TextInput::make('zona')
                            ->label('Zona')
                            ->required(),
                    ]),
            ])
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
