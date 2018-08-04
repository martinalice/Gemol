<?php

namespace App\Form;

use App\Entity\Orden;
use App\Controller\OrdenController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class OrdenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estado', ChoiceType::class, array('choices' => array('INACTIVO' => '2')))
            ->add('tipo', ChoiceType::class, array('choices' => array('Correctivo' => '1', 'Preventivo' => '2', 'Predictivo' => '3' )))
//            ->add('activopadre', ChoiceType::class, array('choices' => array('CAMION FUERA DE RUTA - VOLVO - L4500' => '1', 'PALA CARGADORA - CATERPILLAR - L900' => '2', 'MOTONIVELADORA - LIEBER - H4EK2' => '3')))
//            ->add('activohijo', ChoiceType::class, array('choices' => array('MOTOR PRINCIPAL' => '1', 'BURRO DE ARRANQUE' => '2', 'BALDE 4 M3' => '3', 'CUCHILLA' => '4', 'MOTOR PRINCIPAL' => '5', 'RODADO DELANTERO PRINCIPAL' => '6')))
            ->add('descripcion')
            ->add('criticidad', ChoiceType::class, array('choices' => array('ALTA' => '1', 'MEDIA' => '2', 'BAJA' => '3' )))
            ->add('programainicio', DateType::class, array('data' => new \DateTime('now')))
            ->add('programafin', DateType::class, array('data' => new \DateTime('now')))
            ->add('guardar', SubmitType::class, array('label' => 'Guardar Orden'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orden::class,
        ]);
    }
}
