<?php

namespace Railken\LaraOre\Action\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable as BaseMailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer as MailerContract;

class Mailable extends BaseMailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this;
    }

    
    /**
     * Send the message using the given mailer.
     *
     * @param  \Illuminate\Contracts\Mail\Mailer  $mailer
     * @return void
     */
    public function send(MailerContract $mailer)
    {
        parent::send($mailer);

        foreach ($this->to as $i => $to) {
            $result = (new \Core\MailLog\MailLogManager())->create([
                'subject' => $this->subject,
                'to' => $this->to[$i]['address'],
                'to_name' => $this->to[$i]['name'],
                'body' => view($this->buildView(), $this->buildViewData()),
                'sent' => 1,
            ]);
        }
    }
}
