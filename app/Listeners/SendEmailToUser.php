<?php

namespace App\Listeners;

use App\Events\PostCreat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailToUser
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
     * @param  \App\Events\PostCreat  $event
     * @return void
     */
    public function handle(PostCreat $event)
    {
        Log::alert('Created Post: '.$event->post->title);
    }
}
