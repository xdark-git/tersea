<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class EmployeeInvitation extends Mailable
{
    use Queueable, SerializesModels;

    private string $empoloyeeEmail;
    private string $invatitionLink;

    /**
     * Create a new message instance.
     */
    public function __construct(Employee $employee, string $link)
    {
        $this->empoloyeeEmail = $employee->email;
        $this->invatitionLink = $link;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: Auth::user()->email,
            to: $this->empoloyeeEmail,
            subject: 'Invitation depuis Tersea',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.employee_invitation',
            with: [
                'url' => $this->invatitionLink,
                'sender' => Auth::user()->name
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
