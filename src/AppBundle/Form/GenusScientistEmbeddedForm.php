<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\GenusScientist;

class GenusScientistEmdeddedForm extends AbstractType{
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add('user', EntityType::class)
      ->add('yearsStudied');
  }
  
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
      'data_class' => GenusScientist::class    
    ]);
  }
}

