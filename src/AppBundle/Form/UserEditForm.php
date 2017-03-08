<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Entity\Genus;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('isScientist')
            ->add('firstName')
            ->add('lastName')
            ->add('universityName')
            ->add('studiedGenuses', EntityType::class, [
              'class'=> Genus::class,
              'multiple' => true,
              'expanded' => true,
              'choice_label' => 'name'  
            ])    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
