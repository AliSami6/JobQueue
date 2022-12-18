<?php

namespace App\Listeners;

use App\Mail\QueueMail;
use App\Events\StudentEvent;
use App\Jobs\StudentRegister;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentListener
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
     * @param  \App\Events\StudentEvent  $event
     * @return void
     */
    public function handle(StudentEvent $event)
    {
       StudentRegister::dispatch(request()->all())->delay(now()->addSeconds(10));
    }
}