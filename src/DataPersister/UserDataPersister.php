<?php


namespace App\DataPersister;


use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Twig\Environment;

class UserDataPersister implements DataPersisterInterface
{

    private $entityManager;
    private $userPasswordEncoder;
    private $mailer;
    private $twig;

    public function __construct(EntityManagerInterface $entityManager,
                                UserPasswordEncoderInterface $userPasswordEncoder,
                                 MailerInterface $mailer, Environment $twig)
    {
        $this->entityManager = $entityManager;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function supports($data): bool
    {
        return $data instanceof User;
    }

    /**
     * @param User $data
     * @param array $context
     */
    public function persist($data, array $context = [])
    {
        if ($data->getPlainPassword()) {
            $data->setPassword(
                $this->userPasswordEncoder->encodePassword($data, $data->getPlainPassword())
            );
            $data->eraseCredentials();
        }

        if ($context['collection_operation_name'] ?? null === 'post') {
            $this->sendConfirmationEmail($data);
        }

        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    public function remove($data)
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }

    private function sendConfirmationEmail(User $user)
    {
        $token = $user->getUsername().'_'.rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');
        $user->setConfirmToken($token);
        $this->mailer->send((new Email())
            ->from('mohammedjelidi05@gmail.com')
            ->to($user->getEmail())
            ->subject('Email Confirmation | DogXDog')
            ->html(
                $this->twig->render('email/confirmation.html.twig',
                ['username' => $user->getUsername(),
                    'conf_link' => 'http://localhost:4200/conf_user/' . $token]),
                'text/html'
            ));
    }
}
