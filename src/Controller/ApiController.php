<?php

namespace App\Controller;

use App\Entity\BarList;
use App\Repository\BarListRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GeoJsonConverter;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ApiController extends AbstractController
{
    /**
     * @Route("/")
     *
    */
    public function index()
    {
        return $this->redirectToRoute("api");
    }


    /**
     * @Route("/api", name="api", methods={"GET"})
     *
     */
    public function getGeojson(BarListRepository $repository, GeojsonConverter $geojsonConverter)
    {
        //On recupere la liste de bars
        $bars = $repository->findAllBars();

        //on specifie qu'on utilise un décodeur json
        $encoders = [new JsonEncoder()];
        //on  instance un normaliseur pour convertir en tableau
        $normalizers = [new ObjectNormalizer()];

        //on fait la conversion en json
        //on instancie le convertiseur
        $serializer = new Serializer($normalizers,$encoders);

        //on convertit en json
        $jsonContent = $serializer->serialize($bars, 'json');

        //On convertir le json à geojson
        $geoJson = $geojsonConverter->convertGeoJson($jsonContent);

        //on instencie la reponse
        $response = new Response($geoJson);
        //on ajoute l'entete HTTP
        $response->headers->set('Content-Type', 'application/json');
        //on envoie la reponse
        return $response;
    }

    /**
     * @Route("/api/search/", name="api_barnearby", methods={"GET"})
     *
     */
    public function getNearbyBar (BarListRepository $repository, GeojsonConverter $geojsonConverter, Request $request)
    {
        $params[] = $request->query->get('lat');
        $params[] = $request->query->get('lon');
        $km = $request->query->get('limitkm');
        $params[] = (isset($km)) ? $km : "50";
        $params[] = $request->query->get('terrace');


        //On recupere la liste de bars
        $bars = $repository->findNearbyBars(...$params);

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers,$encoders);
        $jsonContent = $serializer->serialize($bars, 'json');
        $geoJson = $geojsonConverter->convertGeoJson($jsonContent);
        $response = new Response($geoJson);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/api/bar/{id}", name="api_barbyid", methods={"GET"})
     *
     */
    public function getBarbyId (BarListRepository $repository, GeojsonConverter $geojsonConverter, $id)
    {
        //On recupere la liste de bars
        $bar = $repository->findbyBar($id);

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers,$encoders);
        $jsonContent = $serializer->serialize($bar, 'json');
        $geoJson = $geojsonConverter->convertGeoJson($jsonContent);
        $response = new Response($geoJson);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
