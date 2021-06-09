<?php

namespace App\Listeners;

use App\Events\CustomerOccupied;
use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CustomersOccupied
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $occupied = $this->occupied ? 1 : 0;
        $record = Customer::findOrFail($event->id);
        $this->record_id = $event->id;
        $record->occupied = $occupied;
        $record->save();
        session()->flash('message', 'Customer'.$event->id.' Occupied Successfully.');
    }
}
