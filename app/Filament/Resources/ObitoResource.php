<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObitoResource\Pages;
use App\Models\Obito;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class ObitoResource extends Resource
{
    protected static ?string $model = Obito::class;
    protected static ?string $navigationLabel = 'Óbitos';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Legalizaciones';
    public static function getPluralLabel(): string
    {
        return 'Óbitos';
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
                // Campos de datos
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
                Forms\Components\TextInput::make('numero_comprobante')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('difunto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('monto')
                    ->numeric()
                    ->required()
                    ->maxLength(10),
                
                // Campos para PDF
                Forms\Components\FileUpload::make('nota_director_servicios_municipales')
                    ->label('Nota al Director')
                    ->disk('public')
                    ->directory('obitos/notas')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
                Forms\Components\FileUpload::make('fotocopias_comprobantes_entierro_ultima_renovacion')
                    ->label('Fotocopias Comprobantes')
                    ->disk('public')
                    ->directory('obitos/comprobantes')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
                Forms\Components\FileUpload::make('fotocopia_cedula_identidad_fallecido')
                    ->label('Cédula del Fallecido')
                    ->disk('public')
                    ->directory('obitos/cedulas')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
                Forms\Components\FileUpload::make('fotocopia_cedula_identidad_solicitante')
                    ->label('Cédula del Solicitante')
                    ->disk('public')
                    ->directory('obitos/cedulas')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
                Forms\Components\FileUpload::make('orden_judicial')
                    ->label('Orden Judicial')
                    ->disk('public')
                    ->directory('obitos/ordenes')
                    ->acceptedFileTypes(['application/pdf'])
                    ->nullable(),
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
                    ->label('Avenida o Calle')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('numero_casa')
                    ->label('N. Puerta')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('zona')
                    ->label('Zona')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
    
                Tables\Columns\TextColumn::make('monto')
                    ->label('Monto')
                    ->sortable(),
    
                // Añadir otras columnas según sea necesario
    
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
    
                    Tables\Actions\Action::make('ver_comprobantes_entierro')
                        ->label('Ver Comprobantes de Entierro')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Comprobantes de Entierro')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->fotocopias_comprobantes_entierro_ultima_renovacion);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),
    
                    Tables\Actions\Action::make('ver_cedula_fallecido')
                        ->label('Ver Cédula del Fallecido')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Cédula del Fallecido')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->fotocopia_cedula_identidad_fallecido);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),
    
                    Tables\Actions\Action::make('ver_cedula_solicitante')
                        ->label('Ver Cédula del Solicitante')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Cédula del Solicitante')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->fotocopia_cedula_identidad_solicitante);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        })
                        ->color('primary'),
    
                    Tables\Actions\Action::make('ver_orden_judicial')
                        ->label('Ver Orden Judicial')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Orden Judicial')
                        ->modalContent(function ($record) {
                            $pdfUrl = Storage::url($record->orden_judicial);
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
            'index' => Pages\ListObitos::route('/'),
            'create' => Pages\CreateObito::route('/create'),
            'edit' => Pages\EditObito::route('/{record}/edit'),
        ];
    }
}
