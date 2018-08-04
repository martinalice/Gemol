<?php

namespace App\Form;

use App\Entity\Disparo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class DisparoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('dispersion')
            ->add('fecha', DateType::class, array('data' => new \DateTime('now')))
            ->add('configuracion')
            ->add('disparar', SubmitType::class, array('label' => 'Disparar Plan'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Disparo::class,
        ]);
    }
}
