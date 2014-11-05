<?php

namespace Core\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use FOS\UserBundle\Model\UserManagerInterface;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('admin.category.general')
                ->add('username',       'text', array('label' => 'user.username'))
                ->add('email',          'text', array('label' => 'user.email'))
                ->add('plainPassword',  'text', array('label' => 'user.password'))
            ->end()
//            ->with('form.category.groups')
//                ->add('groups', 'sonata_type_model', array('required' => false))
//            ->end()
            ->with('admin.category.management')
//                ->add('roles', 'sonata_security_roles', array( 'multiple' => true))
                ->add('locked',     null, array(
                    'required' => false,
                    'label' => 'user.locked'
                ))
                ->add('expired',    null, array(
                    'required' => false,
                    'label' => 'user.expired'
                ))
                ->add('enabled',    null, array(
                    'required' => false,
                    'label' => 'user.enabled'
                ))
                ->add('credentialsExpired', null, array(
                    'required' => false,
                    'label' => 'user.credentialsExpired'
                ))
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username', null, array('label' => 'user.username'))
//            ->add('roles', null, array('label' => 'user.roles'))
            ->add('enabled', null, array('label' => 'user.enabled'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username', null, array('label' => 'user.username'))
            ->add('email',      null,   array('label' => 'user.email'))
//            ->add('roles',    null,   array('label' => 'user.roles'))
            ->add('enabled',    null,   array('label' => 'user.enabled'))
            ->add('last_login', 'time', array('label' => 'user.last.login'))
        ;
    }

    public function preUpdate($user)
    {
        $this->getUserManager()->updateCanonicalFields($user);
        $this->getUserManager()->updatePassword($user);
    }

    public function setUserManager(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @return UserManagerInterface
     */
    public function getUserManager()
    {
        return $this->userManager;
    }
} 