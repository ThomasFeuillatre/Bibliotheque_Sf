<?php

namespace AppBundle\Form;

use AppBundle\Entity\Book;
use AppBundle\Entity\Borrow;
use AppBundle\Entity\Reader;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BorrowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('book', EntityType::class, array(
            'class' => Book::class,
            'choice_label' => 'title'
        ));
        $builder->add('reader', EntityType::class, array(
            'class' => Reader::class,
            'choice_label' =>   'name'
        ));
        $builder->add('dateBorrow', DateType::class, array(
           'label' => 'Date d\'emprunt',
           'widget' => 'single_text',
           'attr' => ['class' => 'datepicker'],
        ));
        $builder->add('deadline', DateType::class, array(
            'label' => 'Date maximal de retour',
            'widget' => 'single_text',
            'attr' => ['class' => 'datepicker'],
        ));
        $builder->add('submit', SubmitType::class, array(
            'label' => "Valider",
            'attr'  => array('class' => 'btn btn-default pull-right')
        ));
        $builder->add('statut',HiddenType::class, array(
            'data' => '0'
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'=>Borrow::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_borrow_type';
    }


}
