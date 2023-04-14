<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class invitation_card extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $ownerName;
    public $apartmentNumber;
    public $location;
    public $dimansions;
    public $descriptions;
    public $startDate;
    public $endDate;
    public $companyName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $ownerName, $apartmentNumber,$location,$dimansions,$descriptions,$startDate,$endDate,$companyName)
    {
        $this->userName = $userName;
        $this->ownerName = $ownerName;
        $this->apartmentNumber = $apartmentNumber;
        $this->location = $location;
        $this->dimansions = $dimansions;
        $this->descriptions = $descriptions;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
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
            subject: 'Invitation Card',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function build()
    {
        return $this->markdown('emails.invitation_card');
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
