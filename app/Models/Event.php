<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Guava\Calendar\Contracts\Eventable; // Asegúrate de que esta interfaz exista

class Event extends Model implements Eventable
{
    use HasFactory;

    protected $fillable = ['title', 'start', 'end'];

    protected string $eventTitle;
    protected string $eventStart;
    protected string $eventEnd;

    // Método estático para crear una instancia
    public static function make(): self
    {
        return new self();
    }

    // Métodos para establecer los atributos
    public function title(string $title): self
    {
        $this->eventTitle = $title;
        return $this;
    }

    public function start($start): self
    {
        $this->eventStart = $start;
        return $this;
    }

    public function end($end): self
    {
        $this->eventEnd = $end;
        return $this;
    }

    // Implementación de la interfaz Eventable
    public function toEvent(): array
    {
        return [
            'title' => $this->eventTitle,
            'start' => $this->eventStart,
            'end' => $this->eventEnd,
        ];
    }
}
