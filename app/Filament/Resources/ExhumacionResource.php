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

use Filament\Forms\Components\Section;

class ExhumacionResource extends Resource
{
    protected static ?string $model = Exhumacion::class;
    protected static ?string $navigationLabel = 'Exhumaciones';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Servicios';
    public static function getPluralLabel(): string
    {
        return 'Exhumaciones';
    }
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
            // Sección: Datos del Contribuyente
            Section::make('Datos del Contribuyente')
                ->schema([
                    Forms\Components\Grid::make(3)  // Dividimos en 3 columnas
                        ->schema([
                            Forms\Components\TextInput::make('nombre_contribuyente')
                                ->label('Nombre del Contribuyente')
                                ->required(),
    
                            Forms\Components\TextInput::make('apellido_paterno_contribuyente')
                                ->label('Apellido Paterno del Contribuyente')
                                ->nullable(),
    
                            Forms\Components\TextInput::make('apellido_materno_contribuyente')
                                ->label('Apellido Materno del Contribuyente')
                                ->nullable(),
    
                            Forms\Components\TextInput::make('apellido_esposa_contribuyente')
                                ->label('Apellido de Esposa del Contribuyente')
                                ->nullable(),
    
                            Forms\Components\TextInput::make('ci_nit')
                                ->label('CI o NIT')
                                ->required(),
    
                            Forms\Components\TextInput::make('avenida_calle')
                                ->label('Avenida o Calle')
                                ->required(),
    
                            Forms\Components\TextInput::make('numero_puerta')
                                ->label('Número de Puerta')
                                ->required(),
    
                            Forms\Components\TextInput::make('zona')
                                ->label('Zona')
                                ->required(),
    
                            Forms\Components\TextInput::make('numero_celular')
                                ->label('Número de Celular')
                                ->nullable(),
    
                            // Nuevo campo: Número de Comprobante
                            Forms\Components\TextInput::make('numero_comprobante')
                                ->label('Número de Comprobante')
                                ->required(),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
    
            // Sección: Datos del Difunto
            Section::make('Datos del Difunto')
                ->schema([
                    Forms\Components\Grid::make(3)  // Dividimos en 3 columnas
                        ->schema([
                            Forms\Components\TextInput::make('nombre_difunto')
                                ->label('Nombre(s) del Difunto')
                                ->required(),
    
                            Forms\Components\TextInput::make('apellido_paterno_difunto')
                                ->label('Apellido Paterno del Difunto')
                                ->required(),
    
                            Forms\Components\TextInput::make('apellido_materno_difunto')
                                ->label('Apellido Materno del Difunto'),
    
                            Forms\Components\TextInput::make('apellido_esposa_difunto')
                                ->label('Apellido de Esposa del Difunto'),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
    
            // Sección: Detalles del Servicio
            Section::make('Detalles del Servicio')
                ->schema([
                    Forms\Components\Grid::make(2)  // Dividimos en 2 columnas
                        ->schema([
                            Forms\Components\TextInput::make('motivo_exhumacion')
                                ->label('Motivo de Exhumación')
                                ->required(),
    
                            Forms\Components\TextInput::make('nombre_servicio')
                                ->label('Nombre del Servicio')
                                ->default('Exhumación')
                                ->disabled(),
    
                            Forms\Components\TextInput::make('numero_formulario')
                                ->label('Costo de Formulario')
                                ->required()
                                ->numeric(),
    
                            Forms\Components\TextInput::make('costo_servicio')
                                ->label('Costo Servicio')
                                ->required()
                                ->numeric(),
    
                            Forms\Components\DateTimePicker::make('fecha_exhumacion')
                                ->label('Fecha de Exhumación'),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
    
            // Sección: Archivos PDF
            Section::make('Archivos PDF')
                ->schema([
                    Forms\Components\Grid::make(3)  // Dividimos en 3 columnas
                        ->schema([
                            Forms\Components\FileUpload::make('comprobante_pdf')
                                ->label('Comprobante PDF')
                                ->disk('public')
                                ->directory('pdfs')
                                ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/jpg'])
                                ->required(),
    
                            Forms\Components\FileUpload::make('autorizacion_pdf')
                                ->label('Autorización PDF')
                                ->disk('public')
                                ->directory('pdfs')
                                ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/jpg'])
                                ->required(),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
        ]);
    }
    

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_contribuayente')
                    ->label('Nombre Contribuyente')
                    ->searchable(),

                Tables\Columns\TextColumn::make('numero_celular')
                    ->label('N. Celular')
                    ->searchable(),

                Tables\Columns\TextColumn::make('ci_nit')
                    ->label('Ci o Nit')
                    ->searchable(),

                Tables\Columns\TextColumn::make('avenida_calle')
                    ->label('Avenida o Calle')
                    ->searchable(),

                Tables\Columns\TextColumn::make('numero_puerta')
                    ->label('N. Puerta')
                    ->searchable(),

                Tables\Columns\TextColumn::make('zona')
                    ->label('Zona')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nombre_difunto')
                    ->label('Nombre del Difunto')
                    ->searchable(),

                Tables\Columns\TextColumn::make('motivo_exhumacion')
                    ->label('Motivo de Exhumacion')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('costo_formulario')
                    ->label('Costo del Formulario')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('costo_servicio')
                    ->label('Costo del Servicio')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('costo_total')
                    ->label('Costo Total')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),


                Tables\Columns\TextColumn::make('comprobante_pdf')
                    ->label('Ver Comprobante PDF')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('autorizacion_pdf')
                    ->label('Ver Autorización PDF')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('fecha_exhumacion')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
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
                        ->label('Ver Comprobante PDF')
                        ->modalHeading('Documento Comprobante PDF')
                        ->modalContent(function ($record) {
                            $pdfUrl = asset('storage/' . $record->comprobante_pdf);
                            return view('filament.modals.view-pdf', ['pdfUrl' => $pdfUrl]);
                        })
                        ->icon('heroicon-o-document-text')
                        ->color('primary'),

                    Tables\Actions\Action::make('ver_autorizacion_pdf')
                        ->label('Ver Autorización PDF')
                        ->modalHeading('Documento Autorización PDF')
                        ->modalContent(function ($record) {
                            $pdfUrl = asset('storage/' . $record->autorizacion_pdf);
                            return view('filament.modals.view-pdf', ['pdfUrl' => $pdfUrl]);
                        })
                        ->icon('heroicon-o-document-text')
                        ->color('primary'),

                    Tables\Actions\Action::make('preview_pdf')
                        ->label('Imprimir Comprovante')
                        ->icon('heroicon-o-printer')
                        ->color('primary')
                        ->modalHeading('Vista previa del PDF')
                        ->modalContent(function ($record) {
                            $pdfUrl = route('exhumacion.preview', $record->id);
                            return view('filament.modals.view-pdf-ver', ['pdfUrl' => $pdfUrl]);
                        })

                ])


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