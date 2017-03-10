<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvents;
use AppBundle\Entity\GenusScientist;
use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;

class GenusScientistEmbeddedForm extends AbstractType{
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add('user', EntityType::class, [
        'class' => User::class,
        'choice_label' => 'email',
        'query_builder' => function(UserRepository $repo){
          return $repo->createIsScientistQueryBuilder();
        }
      ])
      ->add('yearsStudied') 
      ->addEventListener(FormEvents::POST_SET_DATA, array($this, 'onPostSetData'));
  }
  
  
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
      'data_class' => GenusScientist::class    
    ]);
  }
}

