<?php
/**
 * @author Piotr Strugacz <piotr.strugacz@xsolve.pl>
 */

namespace Ustrugany\FilterBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ustrugany\FilterBundle\Form\Type\DeveloperIdFilterType;
use Ustrugany\FilterBundle\Model\DeveloperIdFilter;
use Ustrugany\FilterBundle\Model\FilterCollection;


/**
 * Class SearcherForm
 * @package Ustrugany\FilterBundle\Form
 */
class SearcherForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', DeveloperIdFilterType::class, [
            'validation_groups' => false,
            'cascade_validation' => false,
            'allow_extra_fields' => true,
        ]);

        $builder->add('id', DeveloperIdFilterType::class);
        $builder->get('id')
            ->addModelTransformer(new CallbackTransformer(
                function ($original) {
                    return $original;
                },
                function ($submitted) {
                    return (new DeveloperIdFilter($submitted));
                }
            ));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', FilterCollection::class);
        $resolver->setDefaults(['csrf_protection' => false, 'validation_groups' => false, 'method'=>'GET']);
    }

    public function getName()
    {
        return '';
    }
}