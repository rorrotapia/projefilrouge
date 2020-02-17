<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GeoJsonConverter;


class ApiController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->redirectToRoute("api");
    }

    /**
     * @Route("/api/geojson", name="api_geojson", methods={"GET"})
     *
     */
    public function getGeojson(GeojsonConverter $geojsonConverter)
    {
        $data = $this->getDoctrine()
            ->getRepository(V2::class)
            ->findAll();

        $geojson = $geojsonConverter->convertGeoJson($data);

        $response = new Response();
        $response->setContent($geojson);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
