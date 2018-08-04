<?php

namespace App\Form;

use App\Entity\Aviso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AvisoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estado', ChoiceType::class, array('choices' => array('ABIERTO' => '5')))
//            ->add('activopadre', ChoiceType::class, array('choices' => array('CAMION FUERA DE RUTA - VOLVO - L4500' => '1', 'PALA CARGADORA - CATERPILLAR - L900' => '2', 'MOTONIVELADORA - LIEBER - H4EK2' => '3')))
//            ->add('activohijo', ChoiceType::class, array('choices' => array('MOTOR PRINCIPAL' => '1', 'BURRO DE ARRANQUE' => '2', 'BALDE 4 M3' => '3', 'CUCHILLA' => '4', 'MOTOR PRINCIPAL' => '5', 'RODADO DELANTERO PRINCIPAL' => '6')))
            ->add('descripcion', TextareaType::class)
            ->add('criticidad', ChoiceType::class, array('choices' => array('ALTA' => '1', 'MEDIA' => '2', 'BAJA' => '3' )))
            ->add('guardar', SubmitType::class, array('label' => 'Guardar Aviso'))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aviso::class,
        ]);
    }
}
