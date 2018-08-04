<?php

namespace App\Form;

use App\Entity\Planif;
use App\Entity\Transito;
use App\Controller\SearchPlanMedicion;
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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class SearchPlantoMedicionType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
//            ->add('numero', HiddenType::class, array('mapped' => false))
            ->add('medicion', SubmitType::class, array('label' => 'Cargar Punto de Medicion'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transito::class,
        ]);
    }


}
