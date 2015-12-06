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

use AppBundle\Model\SiteManagerInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Site Admin Interface.
 * Class to manage Sites.
 *
 * @category AdminInterface
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class SiteAdmin extends Admin
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
     * Gestionnaire de site.
     *
     * @var SiteManagerInterface
     */
    protected $siteManager;

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
            ->with('General', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-primary',
                    'description' => 'Lorem ipsum',
                ))
                ->add('name')
                ->add('description')
                ->add('url')
            ->end()
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
            ->add('name', 'string', array('editable' => true))
            ->add('url', 'url')
        ;
    }

    /**
     * Configure Show mapper.
     *
     * For a quick view.
     *
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->tab('Site') // the tab call is optional
                ->with('Information', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-primary',
                    ))
                    ->add('name')
                    ->add('description')
                    ->add('url', 'url')
                    ->add('owner')
                ->end()
            ->end()
            ->tab('Site') // the tab call is optional
                ->with('Annuaire', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-default',
                ))
                ->add('annuaires')
                ->end()
            ->end()
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

    /**
     * Setter du gestionnaire de site.
     *
     * @param SiteManagerInterface $siteManager
     */
    public function setSiteManager(SiteManagerInterface $siteManager)
    {
        $this->siteManager = $siteManager;
    }

    /**
     * Getter du gestionnaire de site.
     *
     * @return SiteManagerInterface
     */
    public function getSiteManager()
    {
        return $this->siteManager;
    }
}
