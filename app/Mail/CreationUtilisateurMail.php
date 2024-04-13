<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreationUtilisateurMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

     /**
     * Création d'une nouvelle instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

      /**
     * Spécifie les détails de l'enveloppe de l'e-mail.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->data['username'],
            replyTo: 'admin@arcadia.fr',
            subject: 'Votre nouvel identifiant'
            
        );
    }
    /**
     * Spécifie le contenu de l'e-mail.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.user_form_email',
        );
    }

}
