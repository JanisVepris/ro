<?php

namespace RoBundle\Form\Type;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use RoBundle\Entity\Script;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScriptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', CKEditorType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class' => Script::class
        ]);
    }


    public function getBlockPrefix()
    {
        return 'ro_bundle_script_type';
    }
}
