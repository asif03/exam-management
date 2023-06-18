<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class OspeioeInvitation extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = array();
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $rptName = $this->data['invigilators'][0]->name . ".pdf";
        $htm = "exam.ospe-ioe-invitation-pdf";

        $pdf = PDF::loadView($htm, $this->data);

        return $this->subject('FCPS Part-II ' . $this->data['schedule']->subject_name . ' ' . $this->data['schedule']->exam_type . ' Letter')
            ->view('mail.ospe-ioe-invitation')
            ->with([
                'schedule'    => $this->data['schedule'],
                'invigilator' => $this->data['invigilators'][0],
            ])
            ->attachData($pdf->output(), $rptName, [
                'mime' => 'application/pdf',
            ]);

    }
}
