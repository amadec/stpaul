<?php
/**
 * Created by PhpStorm.
 * User: 14LAURENTA
 * Date: 14/03/2016
 * Time: 10:43
 */

namespace stpaul\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SimulType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('famNom', 'text');
        $builder->add('famNbEnfant', 'text');
        $builder->add('famQF', 'text');

        $builder->add('sejNo', 'choice', array(
            'choices' => array('1' => 'Classe de découverte', '2' => 'Classe de mer', '3' => 'Ski à Tignes')
        ));

        $builder->add('simulNbEnfPartant', 'text');

    }

    public function getName()
    {
        return 'simul';
    }
}

?>