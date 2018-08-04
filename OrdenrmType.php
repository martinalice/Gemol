<?php

namespace App\Form;

use App\Entity\Ordenrm;
use App\Controller\OrdenrmController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class OrdenrmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('material1', TextType::class, array('mapped' => false))
            ->add('material2', TextType::class, array('mapped' => false, 'required' => false))
            ->add('material3', TextType::class, array('mapped' => false, 'required' => false))
            ->add('material4', TextType::class, array('mapped' => false, 'required' => false))
            ->add('material5', TextType::class, array('mapped' => false, 'required' => false))
            ->add('material6', TextType::class, array('mapped' => false, 'required' => false))
            ->add('material7', TextType::class, array('mapped' => false, 'required' => false))
            ->add('material8', TextType::class, array('mapped' => false, 'required' => false))
            ->add('material9', TextType::class, array('mapped' => false, 'required' => false))
            ->add('material10', TextType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad1', IntegerType::class, array('mapped' => false))
            ->add('cantidad2', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad3', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad4', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad5', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad6', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad7', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad8', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad9', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('cantidad10', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo1', IntegerType::class, array('mapped' => false))
            ->add('costo2', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo3', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo4', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo5', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo6', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo7', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo8', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo9', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('costo10', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('guardar', SubmitType::class, array('label' => 'Guardar Recursos Materiales'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ordenrm::class,
        ]);
    }
}
