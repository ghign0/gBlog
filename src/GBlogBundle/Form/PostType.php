<?php

namespace GBlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title', null, [
            'attr' => [
                'placeholder' => 'inserisci il titolo del post'
            ]
        ])
        ->add('slug', null, [
            'attr' => [
                'placeholder' => 'inserisci lo slug per URL'
            ]
        ])
        ->add('category')
        ->add('creationDate')
        ->add('status', ChoiceType::class, [
            'choices' => [
                'bozza' => 0,
                'pubblicato' => 1
            ]
        ])
        ->add('publishDate')
        ->add('content')
        ->add('user')
        ->add('tags');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GBlogBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gblogbundle_post';
    }


}
