<?php

namespace RoBundle\Form\Type;

use RoBundle\Entity\EventImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('disabled', CheckboxType::class, ['required' => false])
            ->add('eventDate', DateType::class)
            ->add('eventImage', UploadFileType::class, ['data_class' => EventImage::class]);
    }

    public function getBlockPrefix()
    {
        return 'ro_bundle_event_type';
    }
}
