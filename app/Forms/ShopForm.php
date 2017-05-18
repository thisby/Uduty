<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ShopForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('submit', 'submit', ['label' => \Lang::get('App.shop.validate')]);
    }
}
