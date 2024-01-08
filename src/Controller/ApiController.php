<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends AbstractController
{
    public function example(): JsonResponse
    {
        $data = ['message' => 'ApiRoute'];
        return $this->json($data);
    }
}
