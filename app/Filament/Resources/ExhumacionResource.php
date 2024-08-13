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

class ExhumacionResource extends Resource
{
    protected static ?string $model = Exhumacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('motivo_exhumacion')
                    ->label('Motivo de Exhumación')
                    ->required(),

                Forms\Components\TextInput::make('nombre_servicio')
                    ->label('Nombre del Servicio')
                    ->default('Exhumación')
                    ->disabled(), // Deshabilitado para que no pueda ser editado.

                Forms\Components\TextInput::make('costo_formulario')
                    ->label('Costo de Formulario')
                    ->required()
                    ->numeric(), // Asegura que el campo sólo acepte valores numéricos.

                Forms\Components\TextInput::make('costo_servicio')
                    ->label('Costo Servicio')
                    ->required()
                    ->numeric(), // Asegura que el campo sólo acepte valores numéricos.

                Forms\Components\FileUpload::make('comprobante_pdf')
                    ->label('Documento PDF')
                    ->disk('public') // Asegura que el archivo se guarde en el disco 'public'
                    ->directory('pdfs') // Directorio donde se guardarán los archivos PDF
                    ->acceptedFileTypes(['application/pdf']) // Acepta solo archivos PDF
                    ->required(), // Marca el campo como requerido si es necesario

                Forms\Components\DateTimePicker::make('fecha_exhumacion')
                    ->label('Fecha de Exhumación'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('motivo_exhumacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('costo_formulario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('costo_servicio')
                    ->searchable(),
                // Elimina 'dateTime' para 'comprobante_pdf'
                Tables\Columns\TextColumn::make('comprobante_pdf')
                    ->label('Ver PDF')
                    ->url(fn($record) => route('exhumacion.verPdf', $record->id))
                    ->openUrlInNewTab() // Abre el PDF en una nueva pestaña
                    ->icon('heroicon-o-document-text') // Puedes usar un icono de Heroicons u otro
                    ->color('primary') // Personaliza el color del botón
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('fecha_exhumacion')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Acción personalizada para ver el PDF
                Tables\Actions\Action::make('ver_pdf')
                    ->label('Ver PDF')
                    ->url(fn($record) => route('exhumacion.verPdf', $record->id))
                    ->openUrlInNewTab() // Abre el PDF en una nueva pestaña
                    ->icon('heroicon-o-document-text') // Puedes usar un icono de Heroicons u otro
                    ->color('primary'), // Puedes personalizar el color del botón
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
