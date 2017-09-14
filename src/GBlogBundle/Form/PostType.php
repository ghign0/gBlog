<?php

namespace GBlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;

class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title', null, [
            'label' => 'Titolo',
            'attr' => [
                'placeholder' => 'inserisci il titolo del post'
            ]
        ])
        ->add('slug', null, [
            'label' => 'Slug',
            'attr' => [
                'placeholder' => 'inserisci lo slug per URL'
            ]
        ])
        ->add('category', null , [
            'label' => 'Categoria',
        ])
        ->add('creationDate' ,null , [
            'label' => 'Creato il',
            'widget' => 'single_text',
        ])
        ->add('status', ChoiceType::class, [
            'choices' => [
                'bozza' => 0,
                'pubblicato' => 1
            ]
        ])
        ->add('publishDate', null, [
            'label' => 'Pubblicato il',
            'widget' => 'single_text'
        ])
        ->add('content',null, [
            'label'  => 'Testo'
        ])
        ->add('user', null, [
            'label' => 'Scritto da'
        ])
        ->add('tags')
        ->add('cover', null, [
            'expanded' =>true,
            'multiple' => false,
            'label' => 'Immagine di copertina'
        ]);
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
