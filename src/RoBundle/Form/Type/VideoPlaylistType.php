<?php
namespace RoBundle\Form\Type;

use RoBundle\Entity\VideoPlaylist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoPlaylistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('videos', CollectionType::class, [
            'allow_add' => true,
            'allow_delete' => true,
            'entry_type' => VideoType::class,
            'prototype' => true,
            'by_reference' => false
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class' => VideoPlaylist::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'ro_bundle_video_playlist_type';
    }
}
