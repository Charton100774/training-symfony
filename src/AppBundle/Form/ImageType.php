<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', FileType::class, array(
            'label' => false,
            'required' => false
        ));

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $image = $event->getData();

                if (null == $image) {
                    return;
                }

                if (null != $image->getId()) {
                    $event->getForm()->add('deletedImage', CheckboxType::class, array(
                        'required' => false,
                        'label' => false,
                        'attr' => array(
                            'hidden' => true,
                            'class' => 'delete-img-confirm'
                        )
                    ));
                } else {
                    $event->getForm()->remove('deletedImage');
                }
            }

        );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Image'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_image';
    }


}
