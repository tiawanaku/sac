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
use Filament\Forms\Components\Wizard\Step;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class InhumacioneResource extends Resource
{
    protected static ?string $model = Inhumacione::class;
    protected static ?string $navigationLabel = 'Inhumaciones';
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';
    protected static ?string $navigationGroup = 'Servicios';
   protected static ?string $activeNavigationIcon = 'heroicon-o-clipboard-document-check';
   public static function getNavigationBadge(): ?string
   {
        return static::getModel()::count();
   }

   public static function getNavigationBadgeColor(): ?string
   {
       $count = static::getModel()::count();
   
       if ($count > 4) {
           return 'success'; // Verde
       } elseif ($count > 3) {
           return 'warning'; // Amarillo
       } elseif ($count > 0) {
           return 'danger'; // Rojo
       } else {
           return 'primary'; // Azul por defecto si no hay registros
       }
   }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Información del Difunto')
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
                        ]),
                    
                    Forms\Components\Wizard\Step::make('Detalles del Registro')
                        ->schema([
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
                        ]),
                    
                    Forms\Components\Wizard\Step::make('Ubicación')
                        ->schema([
                            Forms\Components\TextInput::make('fila_ubicacion')
                                ->label('Fila Ubicación')
                                ->required()
                                ->maxLength(255),
                            
                            Forms\Components\TextInput::make('sector_ubicacion')
                                ->label('Sector Ubicación')
                                ->required()
                                ->maxLength(255),
                            
                            Forms\Components\TextInput::make('nro_ubicacion')
                                ->label('Número Ubicación')
                                ->required()
                                ->maxLength(255),
                        ]),
                    
                    Forms\Components\Wizard\Step::make('Información del Solicitante')
                        ->schema([
                            Forms\Components\TextInput::make('nombre_apellido_solicitante')
                                ->label('Nombre y Apellido del Solicitante')
                                ->required(),
                            
                            Forms\Components\TextInput::make('carnet_identidad')
                                ->label('Carnet Identidad o Nit')
                                ->required(),
                            
                            Forms\Components\TextInput::make('celular')
                                ->label('Celular')
                                ->required()
                                ->numeric()
                                ->minLength(8)
                                ->maxLength(8),
                            
                            Forms\Components\TextInput::make('direccion')
                                ->label('Dirección')
                                ->required(),
                            
                            Forms\Components\TextInput::make('numero')
                                ->label('Número de domicilio')
                                ->required(),
                            
                            Forms\Components\TextInput::make('zona')
                                ->label('Zona')
                                ->required(),
                            
                            Forms\Components\FileUpload::make('comprobante_pdf')
                                ->label('Documento PDF')
                                ->disk('public')
                                ->directory('pdfs')
                                ->acceptedFileTypes(['application/pdf'])
                                ->required(),
                        ])
                ])->columnSpanFull()
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

                TextColumn::make('fecha_inhumacion')
                    ->label('Fecha Inhumación')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y'))
                    ->sortable(),

                TextColumn::make('fecha_vencimiento')
                    ->label('Fecha Vencimiento')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y')),

                TextColumn::make('estado'),

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
                Action::make('crear_pdf')
                    ->label('Generar Comprobante')
                    ->icon('heroicon-o-document-text')
                    ->url(fn (): string => route('pdf.example', ['user' => Auth::user()]),
                    shouldOpenInNewTab: true
                ),
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