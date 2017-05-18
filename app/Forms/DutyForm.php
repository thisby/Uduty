<?php

namespace App\Forms;
use Kris\LaravelFormBuilder\Form;

class DutyForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('Title', 'text',['label' => \Lang::get('App.duty.title'),])            
            ->add('Description', 'textarea')
            ->add('Is_Free', 'checkbox',['label' => \Lang::get('App.duty.isFreeDuty')])
            ->add('UltimatumDate', 'date',['label' => \Lang::get('App.duty.ultimatumDate')])
            ->add('MinimumPrice', 'text',['label' => \Lang::get('App.duty.minimumPrice')])
            ->add('MaximumPrice', 'text',['label' => \Lang::get('App.duty.maximumPrice')])
            ->add('submit', 'submit', ['attr' => ['class'  => 'btn btn-lg pull-right'],'label' => \lang::get('App.form.save')]);
    }
}
