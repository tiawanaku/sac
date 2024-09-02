<?php

namespace App\Filament\Ingenio\Resources;

use App\Filament\Ingenio\Resources\RenovacionvingenioResource\Pages;
use App\Filament\Ingenio\Resources\RenovacionvingenioResource\RelationManagers;
use App\Models\RenovacionVillaIngenio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RenovacionvingenioResource extends Resource
{
    protected static ?string $model = RenovacionVillaIngenio::class;
    protected static ?string $navigationLabel = 'Renovaciones Ingenio';
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
                Forms\Components\TextInput::make('difunto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('monto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_renovacion')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_vencimiento')
                    ->required(),
                Forms\Components\FileUpload::make('comprobante_renovacion')
                    ->label('Comprobante Renovación')
                    ->disk('public')
                    ->directory('comprobantes')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
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
                    ->label('Monto de Renovación')->searchable(),

                Tables\Columns\TextColumn::make('fecha_renovacion')
                    ->date()
                    ->label('Fecha de Renovación')->sortable(),

                Tables\Columns\TextColumn::make('fecha_vencimiento')
                    ->date()
                    ->label('Fecha de Vencimiento')->sortable(),

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
            'index' => Pages\ListRenovacionvingenios::route('/'),
            'create' => Pages\CreateRenovacionvingenio::route('/create'),
            'edit' => Pages\EditRenovacionvingenio::route('/{record}/edit'),
        ];
    }
}
