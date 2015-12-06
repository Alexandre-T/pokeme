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

use AppBundle\Entity\Validation;
use Sonata\AdminBundle\Admin\AdminExtension;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Validation Admin Extension.
 *
 * @category AdminExtension
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
class ValidationAdminExtension extends AdminExtension
{
    /**
     * Add Validation form fields tab.
     *
     * @param FormMapper $formMapper
     */
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Validation', array(
                'class' => 'col-md-4',
                'box_class' => 'box box-solid box-info',
                'description' => 'Validation',
            ))
            ->add('validation.status', 'choice', array(
                'choices' => array(
                    Validation::ACCEPTE => 'Accepté',
                    Validation::EN_ATTENTE => 'En attente',
                    Validation::REFUSE => 'Refusé',
                ), ))
            ->add('validation.reason')
            ->end();
    }

    /**
     * Configure List Fields by adding validation status.
     *
     * @param ListMapper $listMapper
     */
    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('validation.status', 'choice', array(
                'choices' => array(
                    Validation::ACCEPTE => 'Accepté',
                    Validation::EN_ATTENTE => 'En attente',
                    Validation::REFUSE => 'Refusé',
                ), ))
            ->add('validation.validator')
        ;
    }
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
            ->tab('Validation')
            ->with('Validation', array(
                'class' => 'col-md-4',
                'box_class' => 'box box-solid',
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
            ->end();
    }
}
