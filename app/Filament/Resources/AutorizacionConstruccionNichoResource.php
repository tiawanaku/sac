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
                Section::make('')  // Agregar un marco con el componente Card
                    ->schema([
                        Forms\Components\Grid::make(3) // Dividir en 3 columnas
                            ->schema([
                                Forms\Components\TextInput::make('nombre_contribuyente')
                                    ->required()
                                    ->label('Nombre del Contribuyente'),

                                Forms\Components\TextInput::make('ci_nit')
                                    ->required()
                                    ->label('CI o NIT'),

                                Forms\Components\TextInput::make('avenida_calle')
                                    ->required()
                                    ->label('Avenida o Calle'),

                                Forms\Components\TextInput::make('numero')
                                    ->required()
                                    ->label('N.Puerta'),

                                Forms\Components\TextInput::make('zona')
                                    ->required()
                                    ->label('Zona'),

                                Forms\Components\TextInput::make('numero_celular')
                                    ->label('Número Celular')
                                    ->nullable(), // Hacerlo opcional si es necesario

                                Forms\Components\TextInput::make('actividad')
                                    ->required()
                                    ->label('Servicio')
                                    ->default('Autorización de Construcción de Nicho'),

                                Forms\Components\TextInput::make('nombre_difunto')
                                    ->label('Nombre del Difunto')
                                    ->nullable(), // Hacerlo opcional si es necesario

                                Forms\Components\DatePicker::make('fecha_autorizacion')
                                    ->label('Fecha de Autorización')
                                    ->required(),

                                Forms\Components\FileUpload::make('comprobante_pdf')
                                    ->label('Comprobante PDF')
                                    ->disk('public') // Especifica el disco de almacenamiento
                                    ->directory('comprobantes') // Directorio dentro del disco
                                    ->nullable(), // Hacerlo opcional si es necesario

                                Forms\Components\TextInput::make('costo_formulario')
                                    ->required()
                                    ->numeric()
                                    ->label('Costo Formulario'),

                                Forms\Components\TextInput::make('costo')
                                    ->required()
                                    ->numeric()
                                    ->label('Costo'),
                            ]),
                    ])
                    ->extraAttributes(['class' => 'p-4 rounded-lg shadow-sm']), // Estilo del contenedor
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

                Tables\Columns\TextColumn::make('actividad')
                    ->label('Servicio')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('numero_celular')
                    ->label('Número Celular')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('nombre_difunto')
                    ->label('Nombre del Difunto')
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
                Tables\Columns\TextColumn::make('costo_total')
                    ->label('Costo Total')
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
            'index' => Pages\ListAutorizacionConstruccionNichos::route('/'),
            'create' => Pages\CreateAutorizacionConstruccionNicho::route('/create'),
            'edit' => Pages\EditAutorizacionConstruccionNicho::route('/{record}/edit'),
        ];
    }
}