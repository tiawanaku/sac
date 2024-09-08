<?php

namespace App\Filament\Widgets;

use Guava\Calendar\Widgets\CalendarWidget;
use Guava\Calendar\ValueObjects\Event;
use App\Models\MyEvent;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class calendar extends CalendarWidget
{
    protected string $calendarView = 'resourceTimeGridWeek';

    /**
     * Devuelve los eventos a mostrar en el calendario.
     *
     * @param array $fetchInfo Información de búsqueda opcional para eventos.
     * @return Collection|array
     */
    public function getEvents(array $fetchInfo = []): Collection|array
    {
        $events = MyEvent::all()->map(function (MyEvent $event) {
            $eventData = $event->toEvent();
            
            // Log para depuración
            Log::info('Evento cargado:', [
                'title' => $eventData->getTitle(),
                'start' => $eventData->getStart()->toDateTimeString(),
                'end' => $eventData->getEnd()->toDateTimeString(),
            ]);
            
            return $eventData;
        })->toArray();

        // Log de eventos cargados
        Log::info('Eventos cargados en el calendario:', $events);

        return $events;
    }
}
