<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name, $email,$date,$orderId,$pdf;
    public function __construct($name,$email,$date,$orderId,$pdf)
    {
        $this->name = $name;
        $this->email = $email;
        $this->date = $date;
        $this->orderId = $orderId;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.invoiceEmail')->attachData($this->pdf, 'customer-invoice.pdf', [
            'mime' => 'application/pdf',
        ]);;
    }
}
