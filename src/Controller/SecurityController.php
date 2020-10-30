<?php

namespace App\Controller;

use ApiPlatform\Core\Api\IriConverterInterface;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login", methods={"POST"})
     * @param IriConverterInterface $iriConverter
     * @return JsonResponse|Response
     */
    public function login(IriConverterInterface $iriConverter)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->json([
                'error' => 'Invalid login request: check that the Content-Type header is "application/json".'
            ], 400);
        }

        return new Response(null, 204, [
            'Location' => $this->getUser()->getId()
        ]);

        /*return new Response(null, 204, [
            'Location' => $iriConverter->getIriFromItem($this->getUser())
        ]);*/
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        //throw new \Exception('should not be reached');
    }

    /**
     * @Route("/connected", name="app_me")
     * @param Request $request
     * @return JsonResponse
     */
    public function isConnected(Request $request)
    {
        if ($this->getUser()) {
            return new JsonResponse([!!$request->cookies->get('PHPSESSID'), $this->getUser()->getId()]);
        }
        // $response = new JsonResponse();
        // $response->headers->setCookie(Cookie::create('foo', 'bar')->withSameSite('lax'));
        // return $response;
        return new JsonResponse([!!$request->cookies->get('PHPSESSID'), null]);
    }

    /**
     * @Route("/isvalidpassword", name="app_valid_pass")
     * @param Request $request
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     * @return JsonResponse
     */
    public function isValidPassword(Request $request, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        return $this->json($userPasswordEncoder->isPasswordValid($this->getUser(), $request->getContent()));
    }

    /**
     * @Route("/confirm_user", name="app_conf_email")
     * @param Request $request
     * @return Response
     */
    public function verifyEmail(Request $request, UserRepository $repository)
    {
        $username = $request->query->get('username');
        $token = $request->query->get('token');
        $user = $repository->findOneBy(['username' => $username]);
        if ($user->getConfirmToken() === $token) {
            $repository->updateConfirmation($user);
            return $this->json('Confirmed!');
        }
        return $this->json('Not confirmed!');
        // return new Response($user->getConfirmToken());
    }
}
