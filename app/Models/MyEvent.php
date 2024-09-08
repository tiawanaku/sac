<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Guava\Calendar\Contracts\Eventable;
use Guava\Calendar\ValueObjects\Event;

class MyEvent extends Model implements Eventable
{
    protected $fillable = ['title', 'start', 'end'];

    public function toEvent(): Event|array
    {
        return Event::make()
            ->title($this->title)
            ->start($this->start)
            ->end($this->end);
    }
}
