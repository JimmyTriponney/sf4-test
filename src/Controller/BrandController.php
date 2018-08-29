<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends AbstractController
{
    /**
     * @Route("/brand/get", name="brand")
     */
    public function index()
    {
        return $this->render('layout.html.twig');

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BrandController.php',
        ]);
    }

    /**
     * @Route("/brand/add", name="brand_add")
     * @Method({"POST", "GET"})
     */
    public function add(Request $request)
    {
        header("Access-Control-Allow-Origin: http://localhost:4200");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Headers: *");
        header("content-type: application/json");
        
        echo '<pre>';
        print_r( $request->files );
        echo '</pre>';
        
        //$response = new Response();

        //$response->headers->set('Access-Control-Allow-Origin', '*');

        //var_dump($request);
        return $this->json([
            'toto' => 'tata',
        ]);
    }
}
