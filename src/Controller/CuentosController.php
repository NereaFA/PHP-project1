<?php

namespace App\Controller;

use App\Entity\Cuentos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CuentosController extends AbstractController
{
    #[Route('/cuentos', name: 'app_cuentos')]
    public function index(EntityManagerInterface $doctrine): Response
    {
        $repositorio = $doctrine->getRepository(Cuentos::class);
        $arrayCuentos = $repositorio->findAll();
        return $this->render('cuentos/verCuentos.html.twig', [
            "cuentos"=> $arrayCuentos //"cuentos" es lo que le mandamos a la base
        ]);
    }
    #[Route('/cuentos/new', name: 'add_cuentos')]
    public function addCuento(EntityManagerInterface $doctrine): Response
    {

        $cuento1 = new Cuentos();
        $cuento1->setTitulo('Los tres cerditos');
        $cuento1->setEscritor('Pepe Loyola');
        $cuento1->setAño(1990);
        $cuento1->setImagen("https://www.picarona.net/wp-content/uploads/2016/01/20150701102359-510x699.jpg");

        $cuento2 = new Cuentos();
        $cuento2->setTitulo('La Sirenita');
        $cuento2->setEscritor('Ignacio Rdguez');
        $cuento2->setAño(1997);
        $cuento2->setImagen("https://i.scdn.co/image/ab67616d0000b273697598e0cfab9a316817687b");

        $cuento3 = new Cuentos();
        $cuento3->setTitulo('Cenicienta');
        $cuento3->setEscritor('Arturo Martinez');
        $cuento3->setAño(1996);
        $cuento3->setImagen("https://prod-ripcut-delivery.disney-plus.net/v1/variant/disney/14A0E0ED728C4B38F8BC4203EE799E04665E08676935950C49A9120B0226A64E/scale?width=1200&aspectRatio=1.78&format=jpeg");

        $doctrine->persist($cuento1); // para enviar los datos a la BD
        $doctrine->persist($cuento2);
        $doctrine->persist($cuento3);

        $doctrine->flush(); //evitar que se quede abierta la BD

        // return $this->render('cuentos/index.html.twig', [
        //     'controller_name' => 'CuentosController',
        // ]);
        return new Response ("Cuentos incluidos"); //para ver una respuesta
    }
}
//http://localhost:8000/cuentos
//http://localhost:8000/cuentos/new
