<?php

namespace App\Listeners;

use App\Events\ProductUpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use\Illuminate\Support\Facades\Log;


// 1. Looks Good! Well implemented


class ProductUpdateListener
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
     * @param  ProductUpdateEvent  $event
     * @return void
     */
    public function handle(ProductUpdateEvent $event)
    {
        //
        Log::info('/handle in ProductUpdateListener.php ' .$event->name);
    }
}
