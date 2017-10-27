<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Product;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProductAdmin extends AbstractAdmin
{
    /**
     * @param Product $object
     * @return string
     */
    public function toString($object)
    {
        return $object instanceof Product ? $object->__toString() : 'Product';
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('quantity', null, ['label' => 'Quantité'])
            ->add('midPrice', null, ['label' => 'Prix de base'])
            ->add('price', null, ['label' => 'Prix'])
            ->add('variation', null, ['label' => 'Variation'])
            ->add('tier', null, ['label' => 'Tiers']);
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('quantity', null, ['label' => 'Quantité'])
            ->add('midPrice', null, ['label' => 'Prix de base'])
            ->add('price', null, ['label' => 'Prix'])
            ->add('variation', null, ['label' => 'Variation'])
            ->add('tier', null, ['label' => 'Tiers'])
            ->add('_action', null, ['actions' => ['show' => null, 'edit' => null, 'delete' => null]]);
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('quantity', null, ['label' => 'Quantité'])
            ->add('midPrice', null, ['label' => 'Prix de base'])
            ->add('price', null, ['label' => 'Prix'])
            ->add('variation', null, ['label' => 'Variation'])
            ->add('tier', null, ['label' => 'Tiers']);
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('quantity', null, ['label' => 'Quantité'])
            ->add('midPrice', null, ['label' => 'Prix de base'])
            ->add('price', null, ['label' => 'Prix'])
            ->add('variation', null, ['label' => 'Variation'])
            ->add('tier', null, ['label' => 'Tiers']);
    }
}
