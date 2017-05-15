<?php

namespace App\Forms;
use Kris\LaravelFormBuilder\Form;

class DutyForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('contenu', 'textarea')
            
            ->add('countries_list', 'entity', [
                'class' => 'Entity\Countries',
                'property' => 'name'])
            
            /*
            ->add('countries_list','collection', [
                'type' => 'choice',
                'options' => [    // these are options for a single type
                    'class' => 'Entity\Countries',
                    'label' => false
                ]
            ])
            */
            ->add('c','select',['choices' => [ 1 => 'category-1', 2 => 'category-2']]);
            /*
            ->add('is_free', 'checkbox')
            ->add('prix_minimum', 'text')
            ->add('prix_maximum', 'text')
            ->add('ultimatum_date', 'text')
            ->add('objet_id',  'entity', [
                'class' => 'Entity\Objet',
                'property' => 'nom'

            /*
            'query_builder' => function (App\Language $lang) {
            // If query builder option is not provided, all data is fetched
            return $lang->where('active', 1);
            
        }
        
        ]

        );
        */
    }
}
