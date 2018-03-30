<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\FormUse;
use App\Form;

class FormInfoForManager extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;
    public $usedForm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(FormUse $formUseObj, Form $form)
    {
        $this->formData = json_decode($formUseObj->json, true);
        $this->usedForm = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from($this->usedForm->from)->subject('New message from form');
        return $this->markdown('emails.manager.userform');
    }
}
