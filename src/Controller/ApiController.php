<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @Route("/api", name="api_")
 */
class ApiController extends AbstractController
{
    #[Route('/api', name: 'api')]
    public function example(): JsonResponse
    {
        $data = ['message' => 'ApiRoute'];
        return $this->json($data);
    }
}


?>