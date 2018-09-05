<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use App\Entity\AdminBrand;

/**
 * @Route("/brand/")
 */
class BrandController extends AbstractController
{
    /**
     * @Route("add", name="admin_brand_add")
     * @Method({"POST"})
     */
    public function add(Request $request)
    {        
        //Récupération des données envoyées
        $getContents = file_get_contents('php://input');
        $post = json_decode($getContents);

        //Si aucune donnée n'a étée envoyée
        if( empty($post) ) {
            //Retour erreur
        }

        //Récupération des informations pour la nouvelle entité
        $nameBrand = $post->name;

        //Récupération de l'entité manager
        $em = $this->getDoctrine()->getManager();
        //Récupération du repository
        $brandRepository = $em->getRepository('App:AdminBrand');

        //Création d'une nouvelle marque
        $newBrand = new AdminBrand();
        $newBrand->setName($nameBrand);

        //Persist de la nouvelle entité
        $em->persist($newBrand);
        //Enregistrement en Base
        $em->flush();

        return $this->json( ['id' => $newBrand->getId(), 'post' => $post, 'status' => 200, 'error' => '' ] );
    }

    /**
     * @Route("get", name="admin_brand_get")
     * @Method({"GET"})
     */
    public function getAll()
    {
        //Récupération de l'entité manager
        $em = $this->getDoctrine()->getManager();
        //Récupération du repository
        $repoBrand = $em->getRepository('App:AdminBrand');
        //Récupération de l'ensemble
        $brands = $repoBrand->findAll();
        //Initialisation du tableau qui va récupérer les données à envoyer
        $data = []; $i = 0;
        //Récupération des données pour les envoyer au front
        foreach($brands as $brand){
            $data[$i]['id'] = $brand->getId();
            $data[$i]['name'] = $brand->getName();
            $i++;
        }

        return $this->json( ['data' => $data, 'status' => 200, 'error' => '' ] );
    }

    /**
     * @Route("delete/{brand_id}", name="admin_brand_delete")
     * @Method({"GET"})
     * @ParamConverter("brand", options={"mapping": {"brand_id": "id"}})
     */
    public function delete(AdminBrand $brand, $brand_id)
    {
        //Récupération de l'entité manager
        $em = $this->getDoctrine()->getManager();
        //Suppression de la marque
        $em->remove($brand);
        //Update de la base de données
        $em->flush();

        return $this->json( ['id' => $brand_id, 'status' => 200, 'error' => '' ] );
    }
}
