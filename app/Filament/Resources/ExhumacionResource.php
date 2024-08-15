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
use Filament\Tables\Actions\Action;
use App\Http\Livewire\VerPdfModal;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ExhumacionResource extends Resource
{
    protected static ?string $model = Exhumacion::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('motivo_exhumacion')->label('Motivo de Exhumación')->required(),
                Forms\Components\TextInput::make('nombre_servicio')->label('Nombre del Servicio')->default('Exhumación')->disabled(),
                Forms\Components\TextInput::make('costo_formulario')->label('Costo de Formulario')->required()->numeric(),
                Forms\Components\TextInput::make('costo_servicio')->label('Costo Servicio')->required()->numeric(),
                Forms\Components\FileUpload::make('comprobante_pdf')->label('Documento PDF')->disk('public')->directory('pdfs')->acceptedFileTypes(['application/pdf'])->required(),
                Forms\Components\DateTimePicker::make('fecha_exhumacion')->label('Fecha de Exhumación'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('motivo_exhumacion')->searchable(),
                Tables\Columns\TextColumn::make('costo_formulario')->searchable(),
                Tables\Columns\TextColumn::make('costo_servicio')->searchable(),
                Tables\Columns\TextColumn::make('comprobante_pdf')
                    ->label('Ver PDF')
                    ->action(function ($record) {
                        $pdfUrl = asset('storage/' . $record->comprobante_pdf);
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
                Tables\Actions\EditAction::make(),
                Action::make('ver_pdf')
                    ->label('Ver PDF')
                    ->icon('heroicon-o-document-text')
                    ->modalHeading('Ver PDF')
                    ->modalContent(function ($record) {

                        $pdfUrl = asset('storage/' . $record->comprobante_pdf);
                        return view('components.pdf-modal', ['pdfUrl' => $pdfUrl]);
                    })
                    ->action(function ($record) {
                        // Acción adicional si es necesario
                    }),
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