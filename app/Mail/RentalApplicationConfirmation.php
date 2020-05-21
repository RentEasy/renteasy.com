<?php

namespace App\Mail;

use App\RentalApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/***
 * This mailable is intended to be sent to a potential tenant
 * when they submit a rental application. This email can be
 * used to quickly get to the tenants rental dashboard.
 *
 * @package App\Mail
 */
class RentalApplicationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public RentalApplication $application;

    /**
     * Create a new message instance.
     *
     * @param RentalApplication $application
     */
    public function __construct(RentalApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rental-application-confirmation');
    }
}
