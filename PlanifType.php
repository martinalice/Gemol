<?php

namespace App\Form;

use App\Entity\Planif;
use App\Entity\Activohijo;
use App\Entity\Activopadre;
use App\Entity\Cronograma;
use App\Controller\PlanifController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PlanifType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estado', ChoiceType::class, array('choices' => array('INACTIVO' => '2')))
            ->add('titulo')
            ->add('tipo', ChoiceType::class, array('choices' => array('Preventivo' => '2', 'Predictivo' => '3' )))
            ->add('estrategia', ChoiceType::class, array('choices' => array('Horaria' => '2', 'Volumen' => '3', 'Distancia' => '4' )))
            ->add('salto', IntegerType::class, array('attr' => array('max' => 999999, 'min' => 1, 'data' => 1)))
//            ->add('activopadre', EntityType::class, array('class' => Activopadre::class, 'choice_label' => function ($activopadre){return $activopadre->getNumero();}))
//            ->add('activohijo', EntityType::class, array('class' => Activohijo::class, 'choice_label' => function ($activohijo){return $activohijo->getNumero();}))
            ->add('guardar', SubmitType::class, array('label' => 'Guardar Plan'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Planif::class,
        ]);
    }
}
