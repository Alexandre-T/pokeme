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

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Vote Admin Interface.
 * Class to manage Votes.
 *
 * @category AdminInterface
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class VoteAdmin extends Admin
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
            ->add('tracker')
            ->add('point')
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
            ->add('tracker')
            ->add('point')
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
            ->addIdentifier('id')
            ->add('user.username')
            ->add('site.name')
            ->add('annuaire.name')
            ->add('created')
            ->add('ipCreator')
            ->add('tracker')
            ->add('point')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
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
        $query->select('o', 'u', 's', 'a')
            ->innerJoin('o.user', 'u')
            ->innerJoin('o.site', 's')
            ->innerJoin('o.annuaire ', 'a');

        return $query;
    }
}
