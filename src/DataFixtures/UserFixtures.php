<?php


namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     * @param $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('mohammedjelidi05@gmail.com');
        $user1->setUsername('mohammedjelidi05');
        $user1->setPassword('hpjelidi1A');
        //$user->setPassword($this->encoder->encodePassword($user, 'hpjelidi1A'));

        $user2 = new User();
        $user2->setEmail('hama00711@hotmail.fr');
        $user2->setUsername('hama00711');
        $user2->setPassword('123456731');

        $manager->persist($user1);
        $manager->persist($user2);

        $manager->flush();
    }
}
