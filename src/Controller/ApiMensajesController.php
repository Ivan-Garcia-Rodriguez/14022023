<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MensajeRepository;
use App\Entity\Mensaje;


class ApiMensajesController extends AbstractController
{
    #[Route('/api/mensajes', name: 'app_api_mensajes')]
    public function index(): Response
    {
        return $this->render('api_mensajes/index.html.twig', [
            'controller_name' => 'ApiMensajesController',
        ]);
    }



    #[Route('/mensaje/{id}', methods: 'GET')]
    public function get(MensajeRepository $MR,$id)
    {
        $Mensaje=$MR->find($id);


        return $this->json(['status' => true, 'mensaje' => $Mensaje], 200);
    }

    #[Route('/mensaje', methods:'GET')]
    public function getAll(MensajeRepository $MR)
    {
        $Mensajes=$MR->findAll();

        return $this->json(['status' => true, 'mensajes' => $Mensajes],200);
    }


    #[Route('/mensaje', methods:'POST')]
    public function nuevo(Request $request,MensajeRepository $MR)
    {
        $Mensaje = new Mensaje();


        $fecha = (date) (json_decode($request->$request->get('fecha')));

    }



    #[Route('/mensaje/{id}', methods: 'DELETE')]
    public function borra(MensajeRepository $MR,$id)
    {
        $participante = $MR->find($id);

        $MR->remove($participante);
    }
}
