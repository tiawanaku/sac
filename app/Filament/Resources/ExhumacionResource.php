<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExhumacionResource\Pages;
use App\Models\Exhumacion;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\ExhumacionResource\RelationManagers;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Http\Livewire\VerPdfModal;
use Livewire\Component;


class ExhumacionResource extends Resource
{
    protected static ?string $model = Exhumacion::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detalles de Exhumación')
                    ->schema([
                        Forms\Components\Grid::make(4) // Define a 2-column grid
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
                            ])
                            ->columns(2) // Set the number of columns
                    ])
                    ->extraAttributes(['class' => 'max-w-4xl mx-auto']) // Add Tailwind classes here
            ]);
    }


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('motivo_exhumacion')->searchable(),
                Tables\Columns\TextColumn::make('costo_servicio')->searchable(),
                Tables\Columns\TextColumn::make('costo_total')->searchable(),
                Tables\Columns\TextColumn::make('comprobante_pdf')
                    ->label('Ver Comprobante PDF')
                    ->action(function ($record) {
                        $pdfUrl = asset('storage/' . $record->comprobante_pdf);
                        return [
                            'dispatchBrowserEvent' => ['openPdfModal', ['pdfUrl' => $pdfUrl]]
                        ];
                    })
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('autorizacion_pdf')
                    ->label('Ver Autorización PDF')
                    ->action(function ($record) {
                        $pdfUrl = asset('storage/' . $record->autorizacion_pdf);
                        return [
                            'dispatchBrowserEvent' => ['openPdfModal', ['pdfUrl' => $pdfUrl]]
                        ];
                    })
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('fecha_exhumacion')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Action::make('ver_comprobante_pdf')
                        ->label('Ver Comprobante PDF')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Comprobante PDF')
                        ->modalContent(function ($record) {
                            $pdfUrl = asset('storage/' . $record->comprobante_pdf);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        }),
                    Action::make('ver_autorizacion_pdf')
                        ->label('Ver Autorización PDF')
                        ->icon('heroicon-o-document-text')
                        ->modalHeading('Ver Autorización PDF')
                        ->modalContent(function ($record) {
                            $pdfUrl = asset('storage/' . $record->autorizacion_pdf);
                            return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                        }),
                ])
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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