<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dataobj = $this->data['data'];
        $sendMail = $this->subject($this->data['subject']);
        if (array_key_exists('view',$this->data) && $this->data['view'] != null){
            $sendMail->view($this->data['view'],compact('dataobj'));
        }
        if (array_key_exists('cc',$this->data)){
            $sendMail->cc($this->data['cc']);
        }
        if (array_key_exists('bcc',$this->data)){
            $sendMail->bcc($this->data['bcc']);
        }

        return $sendMail;
    }
}
