<?php
/**
 * This file is part of the PokeMe Application.
 *
 * PHP version 5
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category LoadDataFixture
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2015 Alexandre Tranchant
 * @license   GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * Load Users of Jdr Application.
 *
 * @category LoadDataFixture
 *
 * @author  Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license GNU General Public License, version 3
 *
 * @link http://opensource.org/licenses/GPL-3.0
 *
 * @codeCoverageIgnore
 */
class LoadSonataUserData extends AbstractLoadData implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * Members are referenced from 1 to 250.
     *
     * @var int
     */
    const MEMBERS = 250;

    /**
     * Admins are referenced from 251 to 300.
     *
     * @var int
     */
    const ADMINISTRATORS = 300;

    /**
     * SUPER_ADMIN are referenced from 301 to 305.
     *
     * @var int
     */
    const SUPERADMIN = 305;

    /**
     * Load data to database.
     *
     * @param ObjectManager $em Doctrine entity manager
     */
    public function load(ObjectManager $em)
    {
        //Données de tests
        if ($this->isEnvironment(array('test', 'dev'))) {
            /* @var \Sonata\UserBundle\Entity\UserManager */
            $userManager = $this->container->get('fos_user.user_manager');
            $birth = date_create('1985-10-10');
            $oneDay = new \DateInterval('P1D');

            //Members creation
            for ($index = 1; $index < self::MEMBERS; ++$index) {
                /* @var \Application\Sonata\UserBundle\Entity\User */
                $member = $userManager->createUser();
                $member->setEmail("membre$index@example.org");
                $member->setWebsite("www$index.example.org");
                $member->setBiography("Biographie de membre $index");
                $member->setDateOfBirth($birth->add($oneDay));
                $member->setEnabled((0 != $index % 5));
                $member->setLocked((0 == $index % 10));
                $member->setLastname("Membre$index");
                $member->setFirstname("Membre$index");
                $member->setUsername("Membre$index");
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($member);
                $member->setPassword($encoder->encodePassword('secret', $member->getSalt()));
                $member->addGroup($this->getReference('group-user'));
                $member->setLocale('fr_FR');
                $member->setTimezone('Europe/Paris');
                $userManager->updateUser($member);
                $this->addReference("user-member-$index", $member);
            }

            for ($index = self::MEMBERS; $index < self::ADMINISTRATORS; ++$index) {
                /* @var \Application\Sonata\UserBundle\Entity\User */
                $administrator = $userManager->createUser();
                $administrator->setEmail("administrator$index@example.org");
                $administrator->setWebsite("www$index.example.org");
                $administrator->setBiography("Biographie de administrator$index");
                $administrator->setDateOfBirth($birth->add($oneDay));
                $administrator->setEnabled(true);
                $administrator->setFirstname("administrator$index");
                $administrator->setUsername("administrator$index");
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($administrator);
                $administrator->setPassword($encoder->encodePassword('secret', $administrator->getSalt()));
                $administrator->addGroup($this->getReference('group-user'));
                $administrator->addGroup($this->getReference('group-admin'));
                $administrator->setLocale('fr_FR');
                $administrator->setTimezone('Europe/Paris');
                $userManager->updateUser($administrator);
                $this->addReference("user-administrator-$index", $administrator);
            }
            for ($index = self::ADMINISTRATORS; $index < self::SUPERADMIN; ++$index) {
                /* @var \Application\Sonata\UserBundle\Entity\User */
                $superAdmin = $userManager->createUser();
                $superAdmin->setEmail("superAdmin$index@example.org");
                $superAdmin->setWebsite("www$index.example.org");
                $superAdmin->setBiography("Biographie de superAdmin $index");
                $superAdmin->setDateOfBirth($birth->add($oneDay));
                $superAdmin->setEnabled(true);
                $superAdmin->setFirstname("superAdmin$index");
                $superAdmin->setUsername("superAdmin$index");
                $encoder = $this->container->get('security.encoder_factory')->getEncoder($superAdmin);
                $superAdmin->setPassword($encoder->encodePassword('secret', $superAdmin->getSalt()));
                $superAdmin->addGroup($this->getReference('group-super-admin'));
                $superAdmin->setLocale('fr_FR');
                $superAdmin->setTimezone('Europe/Paris');
                $userManager->updateUser($superAdmin);
                $this->addReference("user-super-admin-$index", $superAdmin);
            }
        }
    }

    /**
     * Order of these data to be load.
     *
     * @return int
     */
    public function getOrder()
    {
        return 1; // After Group
    }
}
