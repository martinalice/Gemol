<?php

namespace App\Form;

use App\Entity\Orden;
use App\Entity\Transito;
use App\Controller\NoticicacionController;
use App\Controller\SearchOrden;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class SearchOrdenType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('notificacion', SubmitType::class, array('label' => 'Notificar Orden'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transito::class,
        ]);
    }


}
