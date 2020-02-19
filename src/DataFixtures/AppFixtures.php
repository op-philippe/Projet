<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
      private $passwordEncoder;

      public function __construct(UserPasswordEncoderInterface $passwordEncoder)
      {
          $this->passwordEncoder = $passwordEncoder;
      }
        public function load(ObjectManager $manager)
        {
            $user = new User();
            $user->setEmail('toto@gmail.com')
                 ->setPassword($this->passwordEncoder->encodePassword(
                              $user,
                              'toto'
                          ))
                 ->setFirstname('to')
                 ->setLastname('to')
                 ->setRoles(array("ROLE_admin"));

            // $product = new Product();
            // $manager->persist($product);

            $manager->flush();
        }
}
