<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Apartment_reserved extends Mailable
{
    use Queueable, SerializesModels;

    public $apartmentNumber;
    public $ownerName;
    public $startDate;
    public $endDate;
    public $userName;
    public $companyName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $apartmentNumber,
        $ownerName,
        $startDate,
        $endDate,
        $userName,
        $companyName)
    {
        $this->apartmentNumber = $apartmentNumber;
        $this->ownerName = $ownerName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->userName = $userName;
        $this->companyName = $companyName;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: ' Reservation Confirmation for Apartment',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function build()
    {
        return $this->markdown('emails.ownerApartment');
    }
    

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
