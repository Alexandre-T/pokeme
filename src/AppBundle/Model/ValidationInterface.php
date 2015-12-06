<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category Interface
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\Model;

use AppBundle\Entity\Validation;

/**
 * Validation Interface.
 *
 * @category Interface
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
interface ValidationInterface
{
    /**
     * Getter of Validation.
     *
     * @return Validation
     */
    public function getValidation();

    /**
     * Setters of Validation.
     *
     * @param Validation $validation
     *
     * @return mixed
     */
    public function setValidation(Validation $validation);
}
