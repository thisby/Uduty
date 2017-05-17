<?php

namespace App\Forms;
use Kris\LaravelFormBuilder\Form;

class DutyForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('contenu', 'textarea')
            /*
            ->add('countries_list', 'entity', array(
                'class' => 'Entity\Countries',
                'property' => 'name'))
            */
            

            /*
            ->add('countries_list','collection', [
                'type' => 'select',
                'property' => 'name',
                'options' => [    // these are options for a single type
                    'class' => 'Entity\Countries',
                    'label' => true
                ]
            ])
            */
            
            
            ->add('is_free', 'checkbox')
            ->add('prix_minimum', 'text')
            ->add('prix_maximum', 'text')
            ->add('ultimatum_date', 'text');
            /*
            ->add('objet_id',  'entity', 
            array(
                'class' => 'Entity\Objet',
                'property' => 'nom',

            
                'query_builder' => function (\Entity\objet $objet) 
                {
                    // If query builder option is not provided, all data is fetched
                    return $objet;        
                }        
            ))
*/
    }
}
