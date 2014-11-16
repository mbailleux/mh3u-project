<?php

namespace Core\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('locale', 'choice', array(
            'label' => 'form.locale.label',
            'choices' => array(
                'en' => 'form.locale.english',
                'fr' => 'form.locale.french'
            )
        ));
    }

    public function getParent()
    {
        return 'fos_user_profile';
    }

    public function getName()
    {
        return 'core_user_profile';
    }
}