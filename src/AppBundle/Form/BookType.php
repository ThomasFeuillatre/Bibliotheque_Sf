<?php

namespace AppBundle\Form;

use AppBundle\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array(
            'label'=> 'Titre du livre'
        ));
        $builder->add('summary',TextType::class, array(
            'label'=> 'Résumé du livre'
        ));
        $builder->add('submit', SubmitType::class, array(
            'label' => 'Valider',
            'attr'  => array('class' => 'btn waves-effect waves-light')
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'=>Book::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_reader_type';
    }
}
