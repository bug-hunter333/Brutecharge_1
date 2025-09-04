<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $orderData;

    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    public function build()
    {
        return $this->subject('BruteCharge Order Confirmation - Order #' . $this->orderData['order_id'])
                    ->view('emails.order-confirmation')
                    ->with('order', $this->orderData);
    }
}