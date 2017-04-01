<?php
namespace RoBundle\Form\Type;

use RoBundle\Entity\EventImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Roko Operos Pavadinimas'])
            ->add('disabled', CheckboxType::class, ['required' => false, 'label' => 'Deaktyvuoti'])
            ->add('eventDate', DateTimeType::class, ['label' => 'Renginio Data'])
            ->add('eventImage', UploadFileType::class, [
                'data_class' => EventImage::class,
                'label' => 'Pagrindinė nuotrauka'
            ]);
    }

    public function getBlockPrefix()
    {
        return 'ro_bundle_event_type';
    }
}
