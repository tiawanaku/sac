<x-filament::modal wire:model="open">
    <x-slot name="header">
        <h2>Ver PDF</h2>
    </x-slot>

    <x-slot name="body">
        @if ($pdfUrl)
            <iframe src="{{ $pdfUrl }}" width="100%" height="600px" style="border: none;"></iframe>
        @else
            <p>No se encontró el archivo PDF.</p>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-filament::button wire:click="$set('open', false)">
            Cerrar
        </x-filament::button>
    </x-slot>
</x-filament::modal>


@livewire('ver-pdf-modal')

