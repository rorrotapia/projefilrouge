<?php

namespace App\Controller;

use App\Entity\BarList;
use App\Repository\BarListRepository;
use App\Repository\BarOpenHoursRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\JsonFormatter;
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
        return $this->redirectToRoute("api/bars");
    }


    /**
     * @Route("/api/bars", name="bars", methods={"GET"})
     *
     */
    public function getBars(BarListRepository $repository, JsonFormatter $geojsonConverter)
    {
        $day = getdate ();
        $params = [
            'day' => ($day['wday'] === 0) ? 7 : "%".$day['wday']."%",
        ];

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
    public function getOpenBars(BarListRepository $repository, JsonFormatter $geojsonConverter)
    {
        $day = getdate ();
        $params = [
            'day' => ($day['wday'] === 0) ? 7 : "%".$day['wday']."%",
            'currentTime' => date("H:i:s"),
        ];
        //On recupere la liste de bars
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
    public function getFilteredBars (BarListRepository $repository, JsonFormatter $geojsonConverter,Request $request)
    {
        $day = getdate ();
        $params = [
            'day' => ($day['wday'] === 0) ? 7 : "%".$day['wday']."%",
            'price' => $request->query->get('price') ?? 99,
            'terrace' => $request->query->get('terrace') ?? "0,1",
            'openAfter' => $request->query->get('openAfter') ?? "23:00",
            'happyAfter' => $request->query->get('happyAfter') ?? "23:00",
            'currentTime' => date("H:i:s")
        ];
        
        //On recupere la liste de bars
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
}
