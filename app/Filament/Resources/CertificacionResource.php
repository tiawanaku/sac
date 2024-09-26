<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificacionResource\Pages;
use App\Filament\Resources\CertificacionResource\RelationManagers;
use App\Models\Certificacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\Section;

class CertificacionResource extends Resource
{
    protected static ?string $model = Certificacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Sección: Datos del Contribuyente
            Section::make('Datos del Contribuyente')
                ->schema([
                    Forms\Components\Grid::make(2) // Dividir en 2 columnas
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
    
                            Forms\Components\TextInput::make('numero_celular')
                                ->label('Número Celular')
                                ->nullable()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('numero_comprobante')
                                ->label('Número de Comprobante')
                                ->required()
                                ->maxLength(255),
                        ]),
                ]),
    
            // Sección: Datos del Difunto
            Section::make('Datos del Difunto')
                ->schema([
                    Forms\Components\Grid::make(2) // Dividir en 2 columnas
                        ->schema([
                            Forms\Components\TextInput::make('nombre_difunto')
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
                ]),
    
            // Sección: Otros Datos
            Section::make('Otros Datos')
                ->schema([
                    Forms\Components\TextInput::make('monto')
                        ->label('Monto')
                        ->numeric()
                        ->required()
                        ->maxLength(10),
                ]),
    
            // Sección: Archivos PDF
            Section::make('Archivos PDF')
                ->schema([
                    Forms\Components\FileUpload::make('nota_director_servicios_municipales')
                        ->label('Nota al Director')
                        ->disk('public')
                        ->directory('certificaciones/notas')
                        ->acceptedFileTypes(['application/pdf'])
                        ->required(),
    
                    Forms\Components\FileUpload::make('fotocopia_cedula_identidad_usuario')
                        ->label('Fotocopia Cédula de Identidad')
                        ->disk('public')
                        ->directory('certificaciones/cedulas')
                        ->acceptedFileTypes(['application/pdf'])
                        ->required(),
    
                    Forms\Components\FileUpload::make('fotocopia_documento_certificacion')
                        ->label('Documento a Legalizar')
                        ->disk('public')
                        ->directory('certificaciones/documentos')
                        ->acceptedFileTypes(['application/pdf'])
                        ->required(),
                ]),
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

                    Tables\Actions\Action::make('ver_documento_certificar')
                        ->label('Ver Documento a Certificar')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Documento a Certificar')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->fotocopia_documento_certificacion);
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
            'index' => Pages\ListCertificacions::route('/'),
            'create' => Pages\CreateCertificacion::route('/create'),
            'edit' => Pages\EditCertificacion::route('/{record}/edit'),
        ];
    }
}