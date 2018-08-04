<?php

namespace App\Form;

use App\Entity\Planif;
use App\Entity\Transito;
use App\Controller\PlanifController;
use App\Controller\SearchPlanDisparo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;


class SearchPlantoDisparoType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('numero', ChoiceType::class, array('mapped' => false, 'choices' => array('Plan2' => '2', 'Plan3' => '3')))
            ->add('disparar', SubmitType::class, array('label' => 'Disparar Plan'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transito::class,
        ]);
    }
}
