<?php

namespace Core\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class NewsAdmin extends Admin
{

//    public $supportsPreviewMode = true;

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title',      'text',     array('label' => 'news.title'))
            ->add('content',    'textarea', array('label' => 'news.content'))
            ->add('enabled',    'boolean',  array('label' => 'news.enabled'))
            ->add('createdAt',  'datetime', array('label' => 'news.createdAt'))
        ;
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title',      'text',     array('label' => 'news.title'))
            ->add('content',    'textarea', array('label' => 'news.content'))
            ->add('enabled',    'checkbox', array(
                'label' => 'news.enabled',
                'required' => false,
            ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('title',      null, array('label' => 'news.title'))
            ->add('enabled',    null, array('label' => 'news.enabled'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title',    'text',     array('label' => 'news.title'))
            ->add('enabled',            'boolean',  array('label' => 'news.enabled'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show'      => array(),
                    'edit'      => array(),
                    'delete'    => array(),
                )
            ))
        ;
    }
} 