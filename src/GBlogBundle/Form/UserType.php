<?php

namespace GBlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password', RepeatedType::class , [
                'type' => PasswordType::class,
                'invalid_message' => 'Password fileds must match',
                'required' => true,
                'first_options' => ['attr' => ['placeholder' => 'type password']],
                'second_options' => ['attr' => ['placeholder' => 'repeat password']],
            ])
            ->add('role', ChoiceType::class , [
                'choices' => ['user' => 'ROLE_USER', 'admin' => 'ROLE_ADMIN']
            ])
            ->add('active');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GBlogBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gblogbundle_user';
    }


}
