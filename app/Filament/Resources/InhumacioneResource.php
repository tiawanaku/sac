<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InhumacioneResource\Pages;
use App\Models\Inhumacione;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Section;

class InhumacioneResource extends Resource
{
    protected static ?string $model = Inhumacione::class;
    protected static ?string $navigationLabel = 'Inhumaciones';

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';
    protected static ?string $navigationGroup = 'Servicios';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Información del Difunto')
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
                ])
                ->columns(2), // Configura 2 columnas para esta sección
        
            Section::make('Detalles del Registro')
                ->schema([
                 
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
                ])
                ->columns(2), // Configura 2 columnas para esta sección
        
            Section::make('Ubicación')
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
                ])
                ->columns(2), // Configura 2 columnas para esta sección
        
            Section::make('Información del Solicitante')
                ->schema([
                    TextInput::make('nombre_apellido_solicitante')
                        ->label('Nombre y Apellido del Solicitante')
                        ->required(),
                    
                    TextInput::make('carnet_identidad')
                        ->label('Carnet Identidad o Nit')
                        ->required(),
                    
                    TextInput::make('celular')
                        ->label('Celular')
                        ->required()
                        ->numeric()
                        ->minLength(8)
                        ->maxLength(8),
                    
                    TextInput::make('direccion')
                        ->label('Dirección')
                        ->required(),
                    
                    TextInput::make('numero')
                        ->label('Número de domicilio')
                        ->required(),
                    
                    TextInput::make('zona')
                        ->label('Zona')
                        ->required(),
                    
                    FileUpload::make('comprobante_pdf')
                        ->label('Documento PDF')
                        ->disk('public')
                        ->directory('pdfs')
                        ->acceptedFileTypes(['application/pdf'])
                        ->required(),
                ])
                ->columns(2), // Configura 2 columnas para esta sección
        ]);
        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre_difunto')
                    ->label('Nombre Difunto')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('sexo')
                    ->label('Sexo')
                    ->sortable(),

                TextColumn::make('edad')
                    ->label('Edad')
                    ->sortable(),

                TextColumn::make('estado_civil')
                    ->label('Estado Civil')
                    ->sortable(),

                TextColumn::make('nacionalidad')
                    ->label('Nacionalidad'),

                TextColumn::make('fecha_inhumacion')
                    ->label('Fecha Inhumación')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y'))
                    ->sortable(),

                TextColumn::make('fecha_vencimiento')
                    ->label('Fecha Vencimiento')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y')),

                TextColumn::make('comprobante_pdf')
                    ->label('Ver PDF')
                    ->action(function ($record) {
                        $pdfUrl = asset('storage/' . $record->comprobante_pdf);
                        return [
                            'dispatchBrowserEvent' => ['openPdfModal', ['pdfUrl' => $pdfUrl]]
                        ];
                    })
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('ver_pdf')
                    ->label('Ver PDF')
                    ->icon('heroicon-o-document-text')
                    ->modalHeading('Ver PDF')
                    ->modalContent(function ($record) {

                        $pdfUrl = asset('storage/' . $record->comprobante_pdf);
                        return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                    })
                    ->action(function ($record) {
                        // Acción adicional si es necesario
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
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