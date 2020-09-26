<?php

namespace App\Controller;

use App\Entity\Dog;
use App\Repository\DogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DogController extends AbstractController
{

    private $serializer;

    /**
     * @Route("/dog", name="dog_data")
     * @param DogRepository $repository
     * @return JsonResponse
     */
    public function index(DogRepository $repository)
    {
        //$this->jsonSerializer();
        //$dogs = $repository->findAll();
        //$data = $this->serializer->serialize($dogs, 'json');
        //$response->headers->set('Access-Control-Allow-Origin', '*');
        //$response->headers->set('Access-Control-Allow-Credentials', 'true');
        return new JsonResponse(["data"]);
        /*return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DogController.php',
        ]);*/
    }

    /**
     * @Route("/dog/{id}", name="single_dog", methods={"GET"})
     * @param Dog $dog
     * @return JsonResponse
     */
    public function getDog(Dog $dog)
    {
        $this->jsonSerializer();
        $data = $this->serializer->serialize($dog, 'json');
        return new JsonResponse(json_decode($data));
    }

    public function jsonSerializer()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }
}
