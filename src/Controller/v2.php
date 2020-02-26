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


class v2 extends AbstractController
{

    /**
     * @Route("/api/bars/searchgeo", name="bars_searchGeo", methods={"GET"})
     *
     */
    public function getBarWithHourOpen (BarListRepository $repository, JsonFormatter $geojsonConverter,Request $request)
    {
        $km = $request->query->get('limitkm');
        $day = getdate ();
        $params[] = $request->query->get('lat');
        $params[] = $request->query->get('lon');
        $params[] = (isset($km)) ? $km : "50";
        $params[] = $request->query->get('terrace');
        $params[] = ($day['wday'] == 0) ? 7 : $day['wday'];
        $params[] = $request->query->get('starthappy');
        $params[] = $request->query->get('starthour');
        $params[] = $request->query->get('price');

        //On recupere la liste de bars
        $bar = $repository->findBarsGeo(...$params);

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
