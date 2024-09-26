<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalizacionResource\Pages;
use App\Models\Legalizacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\Section;

class LegalizacionResource extends Resource
{
    protected static ?string $model = Legalizacion::class;
    protected static ?string $navigationLabel = 'Legalizaciones';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Legalizaciones';
    public static function getPluralLabel(): string
    {
        return 'Legalizaciones';
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
            // Sección: Información del Contribuyente
            Section::make('Información del Contribuyente')
                ->schema([
                    Forms\Components\Grid::make(3) // Dividir en 3 columnas
                        ->schema([
                            Forms\Components\TextInput::make('ci_nit')
                                ->label('CI o NIT')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('nombre_contribuyente')
                                ->label('Nombre del Contribuyente')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('apellido_paterno_contribuyente')
                                ->label('Apellido Paterno del Contribuyente')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('apellido_materno_contribuyente')
                                ->label('Apellido Materno del Contribuyente')
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('apellido_esposa_contribuyente')
                                ->label('Apellido de Esposa del Contribuyente')
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('direccion')
                                ->label('Dirección')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('numero_casa')
                                ->label('Número de Casa')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('zona')
                                ->label('Zona')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('numero_comprobante')
                                ->label('Número de Comprobante')
                                ->required()
                                ->maxLength(255),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
    
            // Sección: Información del Difunto
            Section::make('Información del Difunto')
                ->schema([
                    Forms\Components\Grid::make(3) // Dividir en 3 columnas
                        ->schema([
                            Forms\Components\TextInput::make('difunto')
                                ->label('Nombre del Difunto')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('apellido_paterno_difunto')
                                ->label('Apellido Paterno del Difunto')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('apellido_materno_difunto')
                                ->label('Apellido Materno del Difunto')
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('apellido_esposa_difunto')
                                ->label('Apellido de Esposa del Difunto')
                                ->maxLength(255),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
    
            // Sección: Detalles de la Renovación
            Section::make('Detalles de la Renovación')
                ->schema([
                    Forms\Components\Grid::make(2) // Dividir en 2 columnas
                        ->schema([
                            Forms\Components\TextInput::make('monto')
                                ->label('Monto')
                                ->numeric()
                                ->required()
                                ->maxLength(10),
    
                            Forms\Components\DatePicker::make('fecha_renovacion')
                                ->label('Fecha de Renovación')
                                ->required(),
    
                            Forms\Components\DatePicker::make('fecha_vencimiento')
                                ->label('Fecha de Vencimiento')
                                ->required(),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
    
            // Sección: Archivos PDF
            Section::make('Archivos PDF')
                ->schema([
                    Forms\Components\Grid::make(2) // Dividir en 2 columnas
                        ->schema([
                            Forms\Components\FileUpload::make('nota_director_servicios_municipales')
                                ->label('Nota al Director')
                                ->disk('public')
                                ->directory('legalizaciones/notas')
                                ->acceptedFileTypes(['application/pdf'])
                                ->required(),
    
                            Forms\Components\FileUpload::make('fotocopia_cedula_identidad_usuario')
                                ->label('Fotocopia Cédula de Identidad')
                                ->disk('public')
                                ->directory('legalizaciones/cedulas')
                                ->acceptedFileTypes(['application/pdf'])
                                ->required(),
    
                            Forms\Components\FileUpload::make('fotocopia_documento_legalizar')
                                ->label('Documento a Legalizar')
                                ->disk('public')
                                ->directory('legalizaciones/documentos')
                                ->acceptedFileTypes(['application/pdf'])
                                ->required(),
                        ]),
                ])
                ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
        ]);
    

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ci_nit')
                    ->label('C.I o NIT')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nombre_contribuyente')
                    ->label('Nombre del Contribuyente')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('direccion')
                    ->label('Dirección')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),

                Tables\Columns\TextColumn::make('numero_casa')
                    ->label('Número de Casa')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),

                Tables\Columns\TextColumn::make('zona')
                    ->label('Zona')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),

                Tables\Columns\TextColumn::make('monto')
                    ->label('Monto')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y H:i:s'))
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de Actualización')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y H:i:s'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Editar')
                        ->icon('heroicon-o-pencil')
                        ->color('primary'),

                    Tables\Actions\Action::make('ver_nota_director')
                        ->label('Ver Nota al Director')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Nota al Director')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->nota_director_servicios_municipales);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),

                    Tables\Actions\Action::make('ver_cedula_identidad')
                        ->label('Ver Cédula de Identidad')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Cédula de Identidad')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->fotocopia_cedula_identidad_usuario);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),

                    Tables\Actions\Action::make('ver_documento_legalizar')
                        ->label('Ver Documento a Legalizar')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Documento a Legalizar')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->fotocopia_documento_legalizar);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLegalizacions::route('/'),
            'create' => Pages\CreateLegalizacion::route('/create'),
            'edit' => Pages\EditLegalizacion::route('/{record}/edit'),
        ];
    }
}
