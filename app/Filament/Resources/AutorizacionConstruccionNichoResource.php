<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AutorizacionConstruccionNichoResource\Pages;
use App\Filament\Resources\AutorizacionConstruccionNichoResource\RelationManagers;
use App\Models\AutorizacionConstruccionNicho;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

use Filament\Forms\Components\Section;

class AutorizacionConstruccionNichoResource extends Resource
{
    protected static ?string $model = AutorizacionConstruccionNicho::class;
    protected static ?string $navigationLabel = 'Construccion de Nicho';
    protected static ?string $navigationGroup = 'Servicios';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
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
                    Forms\Components\Grid::make(3) // Dividir en 3 columnas
                        ->schema([
                            Forms\Components\TextInput::make('nombre_contribuyente')
                                ->label('Nombre del Contribuyente')
                                ->required(),
    
                            Forms\Components\TextInput::make('apellido_paterno_contribuyente')
                                ->label('Apellido Paterno del Contribuyente')
                                ->required(),
    
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
    
                            Forms\Components\TextInput::make('numero')
                                ->label('N. Puerta')
                                ->required(),
    
                            Forms\Components\TextInput::make('zona')
                                ->label('Zona')
                                ->required(),
    
                            Forms\Components\TextInput::make('numero_celular')
                                ->label('Número Celular')
                                ->nullable(),
    
                            Forms\Components\TextInput::make('numero_comprobante')
                                ->label('Número de Comprobante')
                                ->required(),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']),
    
            // Sección: Datos del Difunto
            Section::make('Datos del Difunto')
                ->schema([
                    Forms\Components\Grid::make(3) // Dividir en 3 columnas
                        ->schema([
                            Forms\Components\TextInput::make('nombre_difunto')
                                ->label('Nombre del Difunto')
                                ->required(),
    
                            Forms\Components\TextInput::make('apellido_paterno_difunto')
                                ->label('Apellido Paterno del Difunto')
                                ->required(),
    
                            Forms\Components\TextInput::make('apellido_materno_difunto')
                                ->label('Apellido Materno del Difunto')
                                ->nullable(),
    
                            Forms\Components\TextInput::make('apellido_esposa_difunto')
                                ->label('Apellido de Esposa del Difunto')
                                ->nullable(),
    
                            Forms\Components\TextInput::make('numero_carnet_difunto')
                                ->label('Número de Carnet')
                                ->required(),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']),
    
            // Sección: Detalles del Servicio
            Section::make('Detalles del Servicio')
                ->schema([
                    Forms\Components\Grid::make(2) // Dividir en 2 columnas
                        ->schema([
                            Forms\Components\TextInput::make('actividad')
                                ->label('Servicio')
                                ->required()
                                ->default('Autorización de Construcción de Nicho'),
    
                            Forms\Components\DatePicker::make('fecha_autorizacion')
                                ->label('Fecha de Autorización')
                                ->required(),
    
                            Forms\Components\TextInput::make('costo_formulario')
                                ->label('Costo Formulario')
                                ->required()
                                ->numeric(),
    
                            Forms\Components\TextInput::make('costo')
                                ->label('Costo')
                                ->required()
                                ->numeric(),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']),
    
            // Sección: Archivos PDF
            Section::make('Archivos PDF')
                ->schema([
                    Forms\Components\FileUpload::make('comprobante_pdf')
                        ->label('Comprobante PDF')
                        ->disk('public')
                        ->directory('comprobantes')
                        ->acceptedFileTypes(['application/pdf'])
                        ->required(),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']),
        ]);
    
    }


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nombre_contribuyente')
                ->label('Nombre del Contribuyente')
                ->sortable()
                ->searchable(),
    
            Tables\Columns\TextColumn::make('apellido_paterno_contribuyente')
                ->label('Apellido Paterno del Contribuyente')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true), // Nuevo campo
    
            Tables\Columns\TextColumn::make('apellido_materno_contribuyente')
                ->label('Apellido Materno del Contribuyente')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true), // Nuevo campo
    
            Tables\Columns\TextColumn::make('apellido_esposa_contribuyente')
                ->label('Apellido de Esposa del Contribuyente')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true), // Nuevo campo
    
            Tables\Columns\TextColumn::make('ci_nit')
                ->label('CI o NIT')
                ->sortable()
                ->searchable(),
    
            Tables\Columns\TextColumn::make('avenida_calle')
                ->label('Avenida o Calle')
                ->sortable()
                ->searchable(),
    
            Tables\Columns\TextColumn::make('numero')
                ->label('N.Puerta')
                ->sortable()
                ->searchable(),
    
            Tables\Columns\TextColumn::make('zona')
                ->label('Zona')
                ->sortable()
                ->searchable(),
    
            Tables\Columns\TextColumn::make('numero_celular')
                ->label('Número Celular')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
    
            Tables\Columns\TextColumn::make('numero_comprobante')
                ->label('Número de Comprobante')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true), // Nuevo campo
    
            Tables\Columns\TextColumn::make('nombre_difunto')
                ->label('Nombre del Difunto')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
    
            Tables\Columns\TextColumn::make('apellido_paterno_difunto')
                ->label('Apellido Paterno del Difunto')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true), // Nuevo campo
    
            Tables\Columns\TextColumn::make('apellido_materno_difunto')
                ->label('Apellido Materno del Difunto')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true), // Nuevo campo
    
            Tables\Columns\TextColumn::make('apellido_esposa_difunto')
                ->label('Apellido de Esposa del Difunto')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true), // Nuevo campo
    
            Tables\Columns\TextColumn::make('numero_carnet_difunto')
                ->label('Número de Carnet del Difunto')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true), // Nuevo campo
    
            Tables\Columns\TextColumn::make('actividad')
                ->label('Servicio')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
    
            Tables\Columns\TextColumn::make('fecha_autorizacion')
                ->label('Fecha de Autorización')
                ->date()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
    
            Tables\Columns\TextColumn::make('costo_formulario')
                ->label('Costo Formulario')
                ->sortable()
                ->numeric()
                ->toggleable(isToggledHiddenByDefault: true),
    
            Tables\Columns\TextColumn::make('costo')
                ->label('Costo del Servicio')
                ->sortable()
                ->numeric()
                ->toggleable(isToggledHiddenByDefault: true),
    
            Tables\Columns\TextColumn::make('comprobante_pdf')
                ->label('Comprobante PDF')
                ->formatStateUsing(fn($state) => $state ? basename($state) : 'No disponible')
                ->html()
                ->toggleable(isToggledHiddenByDefault: true),
    
            Tables\Columns\TextColumn::make('created_at')
                ->label('Fecha de Creación')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->actions([
            Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make()
                    ->label('Editar')
                    ->icon('heroicon-o-pencil')
                    ->color('primary'),
    
                Tables\Actions\Action::make('comprobante_pdf')
                    ->label('Ver Comprobante PDF')
                    ->modalHeading('Comprobante PDF')
                    ->modalContent(function ($record) {
                        $pdfUrl = asset('storage/' . $record->comprobante_pdf);
                        return view('filament.modals.view-pdf-ver-construccion', ['pdfUrl' => $pdfUrl]);
                    })
                    ->icon('heroicon-o-document-text')
                    ->color('primary'),
    
                Tables\Actions\Action::make('preview_pdf')
                    ->label('Imprimir Comprobante')
                    ->icon('heroicon-o-printer')
                    ->color('primary')
                    ->modalHeading('Vista previa del PDF')
                    ->modalContent(function ($record) {
                        $pdfUrl = route('construccion.preview', $record->id);
                        return view('filament.modals.view-pdf-ver-comprobate-construccion', ['pdfUrl' => $pdfUrl]);
                    }),
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
            'index' => Pages\ListAutorizacionConstruccionNichos::route('/'),
            'create' => Pages\CreateAutorizacionConstruccionNicho::route('/create'),
            'edit' => Pages\EditAutorizacionConstruccionNicho::route('/{record}/edit'),
        ];
    }
}