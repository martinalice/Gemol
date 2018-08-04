<?php

namespace App\Form;

use App\Entity\Ordenrh;
use App\Controller\OrdenrhController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class OrdenrhType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tarea1', TextType::class, array('mapped' => false))
            ->add('tarea2', TextType::class, array('mapped' => false, 'required' => false))
            ->add('tarea3', TextType::class, array('mapped' => false, 'required' => false))
            ->add('tarea4', TextType::class, array('mapped' => false, 'required' => false))
            ->add('tarea5', TextType::class, array('mapped' => false, 'required' => false))
            ->add('tarea6', TextType::class, array('mapped' => false, 'required' => false))
            ->add('tarea7', TextType::class, array('mapped' => false, 'required' => false))
            ->add('tarea8', TextType::class, array('mapped' => false, 'required' => false))
            ->add('tarea9', TextType::class, array('mapped' => false, 'required' => false))
            ->add('tarea10', TextType::class, array('mapped' => false, 'required' => false))
            ->add('operario1', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario2', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario3', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario4', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario5', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario6', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario7', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario8', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario9', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('operario10', ChoiceType::class, array('mapped' => false, 'choices' => array('Seleccione...' => '0', 'Jose Acosta - Soldador' => '1', 'Dante Coccaro - Electrico' => '2', 'Leandro Porini - Mecanico' => '3', 'Daniel Natolo - Ayudante' => '4')))
            ->add('horas1', IntegerType::class, array('mapped' => false))
            ->add('horas2', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('horas3', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('horas4', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('horas5', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('horas6', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('horas7', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('horas8', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('horas9', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('horas10', IntegerType::class, array('mapped' => false, 'required' => false))
            ->add('guardar', SubmitType::class, array('label' => 'Guardar Recursos Humanos'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ordenrh::class,
        ]);
    }
}
