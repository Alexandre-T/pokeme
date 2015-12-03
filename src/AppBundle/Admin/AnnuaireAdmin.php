<?php
/**
 * This file is part of the JDR Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category AdminInterface
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\Admin;

use AppBundle\Entity\Validation;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Annuaire Admin Interface.
 * Class to manage Annuaires.
 *
 * @category AdminInterface
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class AnnuaireAdmin extends Admin
{
    /**
     * Setup the translation domain.
     *
     * @var string
     */
    protected $translationDomain = 'PokeMeAdminBundle'; // default is 'messages'

    /**
     * Setup the default sort column and order.
     *
     * @var array
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'start',
    );
    /**
     * Configure Show mapper.
     *
     * For a quick view.
     *
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        // Here we set the fields of the ShowMapper variable
        $showMapper
            ->tab('General') // the tab call is optional
                ->with('Information', array(
                    'class'       => 'col-md-8',
                    'box_class'   => 'box box-solid box-primary',
                    'description' => 'Lorem ipsum',
                ))
                ->add('name')
                ->add('description')
                ->add('url','url')
                ->add('owner')
                ->end()
            ->end()
            ->tab('Validation') // the tab call is optional
                ->with('Validation', array(
                    'class'       => 'col-md-4',
                    'box_class'   => 'box box-solid box-info',
                    'description' => 'Lorem ipsum',
                ))
                ->add('validation.status', 'choice', array(
                    'choices' => array(
                        Validation::ACCEPTE => 'Accepté',
                        Validation::EN_ATTENTE => 'En attente',
                        Validation::REFUSE => 'Refusé',
                    ), ))
                ->add('validation.reason')
                ->add('validation.validator')
                ->add('validation.created')
                ->add('validation.updated')
                ->end()
            ->end()
            ->tab('Sites') // the tab call is optional
                ->with('Data', array(
                    'class'       => 'col-md-8',
                    'box_class'   => 'box box-solid box-default',
                    'description' => 'Lorem ipsum',
                ))
                ->add('sites')
                ->end()
            ->end()
            ->tab('Create and Update data') // the tab call is optional
                ->with('Information', array(
                    'class'       => 'col-md-4',
                    'box_class'   => 'box box-solid box-default',
                    'description' => 'Lorem ipsum',
                ))
                ->add('created')
                ->add('ipCreator')
                ->add('updated')
                ->add('ipUpdater')
                ->end()
            ->end()

        ;
    }

    /**
     * Configure Form Fields.
     *
     * For edit and create actions.
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('created')
            ->add('ipCreator')
            ->add('ipUpdater')
        ;
    }

    /**
     * Configure Datagrid Filters.
     *
     * To set listing filters
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('created')
            ->add('ipCreator')
            ->add('ipUpdater')
        ;
    }

    /**
     * Configure List Fields.
     *
     * To set datagrid columns.
     *
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('url', 'url')
            ->add('validation.status', 'choice', array(
                'choices' => array(
                    Validation::ACCEPTE => 'Accepté',
                    Validation::EN_ATTENTE => 'En attente',
                    Validation::REFUSE => 'Refusé',
                ), ))
            ->add('validation.validator')
            ->add('owner')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                )
            ))
        ;
    }

    /**
     * Création de la requête pour éviter d'en exécuter de trop.
     *
     * @param string $context
     *
     * @return \Sonata\AdminBundle\Datagrid\ProxyQueryInterface
     */
    public function createQuery($context = 'list')
    {
        if ('list' != $context) {
            return parent::createQuery($context);
        }

        $query = parent::createQuery($context);
        $query->select('o', 'u', 'v', 'v2')
            ->innerJoin('o.owner', 'u')
            ->leftJoin('o.validation', 'v')
            ->leftJoin('v.validator', 'v2');

        return $query;
    }
}
