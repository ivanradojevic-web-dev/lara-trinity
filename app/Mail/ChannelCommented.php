<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChannelCommented extends Mailable
{
    use Queueable, SerializesModels;

    public $channelname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($channelname)
    {
        $this->channelname = $channelname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.channel_commented');
    }
}
