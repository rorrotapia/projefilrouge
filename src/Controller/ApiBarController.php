<?php

namespace App\Controller;

use App\Entity\BarList;
use App\Repository\BarListRepository;
use App\Service\RequestFilters;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\JsonFormatter;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ApiBarController extends AbstractController
{
    /**
     * @Route("/")
     *
    */
    public function index()
    {
        return $this->redirectToRoute("api/bars");
    }

    /**
     * @Route("/api/bars", name="bars", methods={"GET"})
     *
     */
    public function getBars(BarListRepository $repository, JsonFormatter $geojsonConverter,Request $request, RequestFilters $filters)
    {
        //verification de parametres
        $params = $filters->RequestFilters($request);
        //On recupere la liste de bars
        $bars = $repository->findAllBars($params);
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
     * @Route("/api/bars/open", name="barsOpen", methods={"GET"})
     *
     */
    public function getOpenBars(BarListRepository $repository, JsonFormatter $geojsonConverter, Request $request, RequestFilters $filters)
    {
        $params = $filters->RequestFilters($request);
        $bars = $repository->findAllOpenBars($params);

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers,$encoders);
        $jsonContent = $serializer->serialize($bars, 'json');
        $geoJson = $geojsonConverter->convertGeoJson($jsonContent);
        $response = new Response($geoJson);
        $response->headers->set('Content-Type', 'application/json');
        //on envoie la reponse
        return $response;
    }

    /**
     * @Route("/api/bars/search", name="bars_search", methods={"GET"})
     *
     */
    public function getFilteredBars (BarListRepository $repository, JsonFormatter $geojsonConverter,Request $request, RequestFilters $filters)
    {
        $params = $filters->RequestFilters($request);
        $bar = $repository->findBars($params);

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers,$encoders);
        $jsonContent = $serializer->serialize($bar, 'json');
        $geoJson = $geojsonConverter->convertGeoJson($jsonContent);
        $response = new Response($geoJson);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/api/bars/searchgeo/", name="bars_search_geo", methods={"GET"})
     *
     */
    public function getFilteredBarsGeo (BarListRepository $repository, JsonFormatter $geojsonConverter,Request $request, RequestFilters $filters)
    {
        $params = $filters->RequestFilters($request,true);
        $limit =  $request->query->get("limit");
        $bar = $repository->findBarGeo($params,$limit);

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
