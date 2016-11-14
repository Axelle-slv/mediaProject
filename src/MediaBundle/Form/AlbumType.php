<?php

namespace MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AlbumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')->add('artiste')->add('genre')->add('support')        ;

        $builder->add('genre', ChoiceType::class, array(
            'choices'  => array(
                'HipHop' => 'HipHop',
                'Soul' => 'Soul',
                'Rock' => 'Rock',
            ),
            // *this line is important*
            'choices_as_values' => true,
        ));

        $builder->add('support', ChoiceType::class, array(
            'choices'  => array(
                'Vinyl' => 'vinyl',
                'CD' => 'CD',
                'Cassette' => 'cassette',
            ),
            // *this line is important*
            'choices_as_values' => true,
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediaBundle\Entity\Album'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mediabundle_album';
    }


}
