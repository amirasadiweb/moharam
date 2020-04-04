<?php

namespace App\Listeners;

use App\Events\UserWasBanned;

class EmailBanNotfication
{
    /**
     * @var Mailer
     */
    public $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
//        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        // baraye ersal email
//        $this->mailer->SendBanNotification($event->user->email);
        ///

        var_dump("Notfity",$event->user->name,$event->user->email,'You Are Banded');
    }
}
