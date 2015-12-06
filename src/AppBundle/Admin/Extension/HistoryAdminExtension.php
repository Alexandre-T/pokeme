<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category AdminExtension
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\Admin\Extension;

use Sonata\AdminBundle\Admin\AdminExtension;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * History Admin Extension.
 *
 * @category AdminExtension
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class HistoryAdminExtension extends AdminExtension
{
    /**
     * Configure Show mapper by adding the validation tab.
     *
     * For a quick view.
     *
     * @param ShowMapper $showMapper
     */
    public function configureShowFields(ShowMapper $showMapper)
    {
        // Here we set the fields of the ShowMapper variable
        $showMapper
            ->tab('History') // the tab call is optional
            ->with('History', array(
                'class' => 'col-md-4',
                'box_class' => 'box box-solid box-default',
            ))
            ->add('created')
            ->add('ipCreator')
            ->add('updated')
            ->add('ipUpdater')
            ->end()
            ->end();
    }
}
