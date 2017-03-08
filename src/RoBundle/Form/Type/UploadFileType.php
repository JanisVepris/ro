<?php
namespace RoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class UploadFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', FileType::class, [
            'data_class' => $options['data_class'],
            'required' => false,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'ro_bundle_upload_file_type';
    }
}
