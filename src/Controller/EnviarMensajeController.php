<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnviarMensajeController extends AbstractController
{
    #[Route('/enviar/mensaje', name: 'app_enviar_mensaje')]
    public function index(): Response
    {
        return $this->render('enviar_mensaje/index.html.twig', [
            'controller_name' => 'EnviarMensajeController',
        ]);
    }
}
