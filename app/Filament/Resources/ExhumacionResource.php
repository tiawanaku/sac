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
                    ->disabled(),

                Forms\Components\TextInput::make('costo_formulario')
                    ->label('Costo de Formulario')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('costo_servicio')
                    ->label('Costo Servicio')
                    ->required()
                    ->numeric(),

                Forms\Components\FileUpload::make('comprobante_pdf')
                    ->label('Comprobante PDF')
                    ->disk('public')
                    ->directory('pdfs')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),

                Forms\Components\FileUpload::make('autorizacion_pdf')
                    ->label('Autorización PDF')
                    ->disk('public')
                    ->directory('pdfs')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),

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
                ])
                    ->label('Acciones')
                    ->icon('heroicon-o-ellipsis-horizontal')  // Icono del menú desplegable
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