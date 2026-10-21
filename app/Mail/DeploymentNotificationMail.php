<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeploymentNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    public $deployment;
    public $pdfPath;

    /**
     * Create a new message instance.
     */
    public function __construct($employee, $deployment, $pdfPath)
    {
        $this->employee = $employee;
        $this->deployment = $deployment;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Deployment Notification')
                    ->view('emails.deployment-notification')
                    ->attach($this->pdfPath, [
                        'as' => 'Deployment_Details.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
