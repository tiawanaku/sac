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
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                Wizard::make([
                    Step::make('Información del Difunto')
                        ->schema([
                            TextInput::make('nombre_difunto')
                                ->label('Nombre Difunto(a)')
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

                            FileUpload::make('defuncion_pdf')
                                ->label('Defunción PDF')
                                ->disk('public')
                                ->directory('pdfs')
                                ->acceptedFileTypes(['application/pdf'])
                                ->required(),
                        ]),

                    Step::make('Detalles del Registro')
                        ->schema([
                            DatePicker::make('fecha_inhumacion')
                                ->label('Fecha Inhumación')
                                ->required(),

                            DatePicker::make('fecha_vencimiento')
                                ->label('Fecha Vencimiento')
                                ->required(),

                            TextInput::make('dia')
                                ->label('Monto')
                                ->required(),

                            Select::make('descripcion_nicho')
                                ->label('Descripción de Nicho')
                                ->options([
                                    'nicho menor' => 'Nicho Menor hasta 70cm',
                                    'nicho mayor' => 'Nicho Mayor mayor a 70cm',
                                    'tumba' => 'Tumba',
                                ])
                                ->required(),
                        ]),

                    Step::make('Ubicación')
                        ->schema([
                            TextInput::make('fila_ubicacion')
                                ->label('Fila Ubicación')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('nro_ubicacion')
                                ->label('Columna Ubicación')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('sector_ubicacion')
                                ->label('Sector Ubicación')
                                ->required()
                                ->maxLength(255),
                        ]),

                    Step::make('Información del Solicitante')
                        ->schema([
                            TextInput::make('nombre_apellido_solicitante')
                                ->label('Nombre y Apellido del Solicitante')
                                ->required(),

                            TextInput::make('carnet_identidad')
                                ->label('Carnet Identidad o NIT')
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
                                ->label('Número de Domicilio')
                                ->required(),

                            TextInput::make('zona')
                                ->label('Zona')
                                ->required(),

                            FileUpload::make('comprobante_pdf')
                                ->label('Carta de Solicitud o comprobante')
                                ->disk('public')
                                ->directory('pdfs')
                                ->acceptedFileTypes(['application/pdf']),

                            FileUpload::make('testigos_pdf')
                                ->label('Certificado medico')
                                ->disk('public')
                                ->directory('pdfs')
                                ->acceptedFileTypes(['application/pdf'])
                                ->required(),

                            FileUpload::make('familiares_pdf')
                                ->label('Fotocopia de Familiares 1 o 2 pdfs')
                                ->disk('public')
                                ->directory('pdfs')
                                ->acceptedFileTypes(['application/pdf'])
                                ->required()
                                ->multiple() // Permite la carga de múltiples archivos
                                ->maxFiles(2) // Limita a un máximo de 3 archivos
                                ->minFiles(1), // Requiere al menos 1 archivo
                        ]),
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

                TextColumn::make('sexo')
                    ->label('Sexo')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('edad')
                    ->label('Edad')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('estado_civil')
                    ->label('Estado Civil')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('nacionalidad')
                    ->label('Nacionalidad')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('diagnostico_fallecimiento')
                    ->label('Diagnistico de Fallecimiento')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('Medico')
                    ->label('Medico')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('orc')
                    ->label('Oficialia de Registro Civil')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('libro')
                    ->label('Nro de Libro')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('folio')
                    ->label('Nro de Folio')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('fecha_inhumacion')
                    ->label('Fecha Inhumación')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y'))
                    ->sortable(),

                TextColumn::make('fecha_vencimiento')
                    ->label('Fecha Vencimiento')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y')),

                TextColumn::make('dia')
                    ->label('Costo del Servicio')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('descripcion_nicho')
                    ->label('Descripcion del Nicho')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('nombre_apellido_solicitante')
                    ->label('Nombre del Solicitante')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('carnet_identidad')
                    ->label('C.I. Solicitante')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('celular')
                    ->label('Celular del Familiar')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('direccion')
                    ->label('Direccion del Familiar')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('zona')
                    ->label('Zona del Familiar')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('sector_ubicacion')
                    ->label('Ubicacion del Difunto')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('fecha de creacion')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('fecha de actualizacion')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('estado'),

                TextColumn::make('comprobante_pdf')
                    ->label('Ver PDF')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Editar')
                        ->icon('heroicon-o-pencil')
                        ->color('primary'),
            
                    Tables\Actions\Action::make('ver_comprobante_pdf')
                        ->label('Ver Defuncion')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Defuncion')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->comprobante_pdf);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),
            
                    Tables\Actions\Action::make('ver_testigos_pdf')
                        ->label('Ver Comprobante')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Comprobante')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->testigos_pdf);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),
            
                    Tables\Actions\Action::make('ver_defuncion_pdf')
                        ->label('Ver Certificado Medico')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Certificado Medico')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->defuncion_pdf);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),
            
                    Tables\Actions\Action::make('ver_familiares_pdf')
                        ->label('Ver Fotocopia de Familiares')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Fotocopia de Familiares')
                        ->modalContent(function ($record) {
                            $pdfUrls = array_map(fn($path) => Storage::url($path), json_decode($record->familiares_pdf, true) ?? []);
                            return view('components.pdf-modal', ['pdfUrls' => $pdfUrls]);
                        })
                        ->color('primary'),
            
                    Tables\Actions\Action::make('crear_pdf')
                        ->label('Generar Comprobante')
                        ->icon('heroicon-o-document-text')
                        ->url(fn(): string => route('pdf.example', ['user' => Auth::user()]))
                        ->openUrlInNewTab()
                        ->color('primary'),
                ])
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
