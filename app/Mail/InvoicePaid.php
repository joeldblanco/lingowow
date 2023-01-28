<?php

namespace App\Mail;

use App\Invoice;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoicePaid extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The invoice instance.
     *
     * @var \App\Invoice
     */
    public $invoice;

    /**
     * Create a new message instance.
     *
     * @param  \App\Invoice  $invoice
     * @return void
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = Pdf::loadView('emails.invoices.paid', ['invoice' => $this->invoice]);
        $pdf_data = $pdf->output();

        return $this->view('emails.invoices.paid')->attachData($pdf_data, 'Lingowow Invoice ' . (new Carbon($this->invoice->created_at))->isoFormat('MMM Y') . ' (' . str_pad($this->invoice->user->id, 6, '0', STR_PAD_LEFT) . ' - ' . str_pad($this->invoice->id, 9, '0', STR_PAD_LEFT) . ').pdf', [
            'mime' => 'application/pdf',
        ]);
    }
}
