<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Komentar extends Mailable
{
    use Queueable, SerializesModels;
    
    public $komen;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($komen)
    {
        $this->komen = $komen;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail');
    }
}
