<?php

namespace App\Forms;
use Kris\LaravelFormBuilder\Form;

class DutyForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Title', 'text',['label' => \Lang::get('App.duty.title')])            
            ->add('Description', 'textarea')
            ->add('Is_Free', 'checkbox',['label' => \Lang::get('App.duty.isFreeDuty')])
            ->add('MinimumPrice', 'text',['label' => \Lang::get('App.duty.minimumPrice')])
            ->add('MaximumPrice', 'text',['label' => \Lang::get('App.duty.maximumPrice')])
            ->add('submit', 'submit', ['label' => \lang::get('App.form.save')]);
    }
}
