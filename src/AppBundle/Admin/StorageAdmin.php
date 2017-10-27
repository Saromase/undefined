<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Storage;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class StorageAdmin extends AbstractAdmin
{
    /**
     * @param Storage $object
     * @return string
     */
    public function toString($object)
    {
        return $object instanceof Storage ? $object->__toString() : 'Storage';
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('length', null, ['label' => 'Taille'])
            ->add('price', null, ['label' => 'Prix']);
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('length', null, ['label' => 'Taille'])
            ->add('price', null, ['label' => 'Prix'])
            ->add('_action', null, ['actions' => ['show' => null, 'edit' => null, 'delete' => null]]);
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('length', null, ['label' => 'Taille'])
            ->add('price', null, ['label' => 'Prix']);
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', null, ['label' => 'Nom'])
            ->add('length', null, ['label' => 'Taille'])
            ->add('price', null, ['label' => 'Prix']);
    }
}
