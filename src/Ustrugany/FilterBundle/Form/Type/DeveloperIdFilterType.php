<?php
/**
 * @author Piotr Strugacz <piotr.strugacz@xsolve.pl>
 */

namespace Ustrugany\FilterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ustrugany\FilterBundle\Model\DeveloperIdFilter;

/**
 * Class DeveloperIdFilterType
 * @package Ustrugany\FilterBundle\Form\Type
 */
class DeveloperIdFilterType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => DeveloperIdFilter::class,
                'property_path' => 'id',
            ]);
    }

    public function getName()
    {
        return 'developer_id_filter_type';
    }

    public function getParent()
    {
        return TextType::class;
    }
}