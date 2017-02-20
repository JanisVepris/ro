<?php
namespace RoBundle\Form\Type;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use RoBundle\Entity\ArticleImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('content', CKEditorType::class, [
                'config' => [
//                    'filebrowserBrowseRoute' => 'elfinder',
//                    'filebrowserBrowseRouteParameters' => [
//                        'instance' => 'default',
//                        'homeFolder' => ''
//                    ]
                ],
            ])
            ->add('published', CheckboxType::class, ['required' => false])
            ->add('articleImage', UploadFileType::class, ['data_class' => ArticleImage::class]);
    }

    public function getBlockPrefix()
    {
        return 'ro_bundle_article_type';
    }
}
