<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RenovacionResource\Pages;
use App\Filament\Resources\RenovacionResource\RelationManagers;
use App\Models\Renovacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class RenovacionResource extends Resource
{
    protected static ?string $model = Renovacion::class;
    protected static ?string $navigationLabel = 'Renovaciones';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Servicios';
    protected static ?string $activeNavigationIcon = 'heroicon-o-clipboard-document-check';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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
    
                            Forms\Components\TextInput::make('ci_nit')
                                ->label('CI o NIT')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('numero_comprobante')
                                ->label('Número de Comprobante')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('numero_casa')
                                ->label('Número de Casa')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('direccion')
                                ->label('Dirección')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\TextInput::make('zona')
                                ->label('Zona')
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
    
            // Sección: Información de Renovación
            Section::make('Información de Renovación')
                ->schema([
                    Forms\Components\Grid::make(2) // Dividir en 2 columnas
                        ->schema([
                            Forms\Components\TextInput::make('monto')
                                ->label('Monto')
                                ->required()
                                ->maxLength(255),
    
                            Forms\Components\DatePicker::make('fecha_renovacion')
                                ->label('Fecha de Renovación')
                                ->required(),
    
                            Forms\Components\DatePicker::make('fecha_vencimiento')
                                ->label('Fecha de Vencimiento')
                                ->required(),
    
                            Forms\Components\FileUpload::make('comprobante_renovacion')
                                ->label('Comprobante Renovación')
                                ->disk('public')
                                ->directory('comprobantes')
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
                    ->label('C.I o Nit')->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('nombre_contribuyente')
                    ->label('Contribuyente')->searchable(),
                
                Tables\Columns\TextColumn::make('direccion')
                    ->label('Dirección Contribuyente')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('zona')
                    ->label('Zona')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('difunto')
                    ->label('Difunto(a)')->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('monto')
                    ->label('Monto de Renovacion')->searchable(),

                Tables\Columns\TextColumn::make('fecha_renovacion')
                    ->date()
                    ->label('fecha de Renovacion')->sortable(),

                Tables\Columns\TextColumn::make('fecha_vencimiento')
                    ->date()
                    ->label('fecha de vencimiento')->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y H:i:s'))
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de Actualización')
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Facades\Date::parse($state)->format('d/m/Y H:i:s'))
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Editar')
                        ->icon('heroicon-o-pencil')
                        ->color('primary'),
            
                    Tables\Actions\Action::make('ver_comprobante_renovacion')
                        ->label('Ver Comprobante Renovación')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Comprobante Renovación')
                        ->modalContent(function ($record) {
                            $fileUrl = asset('storage/' . $record->comprobante_renovacion);
                            return view('components.file-modal', ['fileUrl' => $fileUrl]);
                        })
                        ->color('primary'),
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
            'index' => Pages\ListRenovacions::route('/'),
            'create' => Pages\CreateRenovacion::route('/create'),
            'edit' => Pages\EditRenovacion::route('/{record}/edit'),
        ];
    }
}
