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
                    ->label('Comprobante Renovacion')
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
                    
                    ->label('C.I o Nit')->searchable(),
                Tables\Columns\TextColumn::make('nombre_contribuyente')
                    ->label('Contribuyente')->searchable(),
                Tables\Columns\TextColumn::make('difunto')

                    ->label('Difunto(a)')->searchable(),
                Tables\Columns\TextColumn::make('monto')

                    ->label('Monto de Renovacion')->searchable(),
                Tables\Columns\TextColumn::make('fecha_renovacion')
                    ->date()

                    ->label('fecha de Renovacion')->sortable(),
                Tables\Columns\TextColumn::make('fecha_vencimiento')
                    ->date()
                    ->label('fecha de vencimiento')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('ver_comprobante_renovacion')
                    ->label('Ver Comprobante Renovación')
                    ->icon('heroicon-o-document-text')
                    ->modalHeading('Ver Comprobante Renovación')
                    ->modalContent(function ($record) {
                        $fileUrl = asset('storage/' . $record->comprobante_renovacion);
                        return view('components.file-modal', ['fileUrl' => $fileUrl]);
                    }),
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
