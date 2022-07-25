<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;


class ApiController extends AbstractController
{

    #[Route('/', name: 'home_api')]
    public function index(Request $request): Response
    {
        

    $client = HttpClient::create();
        $responseUser = $client->request(
            'GET',
             "https://127.0.0.1:8000/api/articles/3"
        );
        //$user = json_decode($responseUser->getContent(), true)['hydra:member'];
        $statusCode = $responseUser->getStatusCode();
        dd($statusCode);
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
