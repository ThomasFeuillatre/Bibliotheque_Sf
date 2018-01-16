<?php

namespace AppBundle\Form;

use AppBundle\Entity\Reader;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReaderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array(
            'label'=> 'Nom du lecteur'
        ));
        $builder->add('firstName',TextType::class, array(
            'label'=> 'Prénom du lecteur'
        ));
        $builder->add('dateAbonnement',DateType::class,array(
            'label' => 'Date d\'abonnement',
            'widget' => 'single_text',
            'attr' => ['class' => 'datepicker']));
        $builder->add('submit', SubmitType::class, array(
            'label' => 'Valider',
            'attr'  => array('class' => 'btn waves-effect waves-light')
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'=>Reader::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_reader_type';
    }
}
