<?php

namespace App\Controller;

use App\Entity\SportsList;
use App\Entity\BarList;
use App\Repository\BarListRepository;
use App\Repository\SportsListRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\JsonFormatter;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;


class ApiSportController extends AbstractController
{
    /**
     * @Route("/api/sports/", name="sportspopup", methods={"GET"})
     *
     */
    public function getPopupBar (SportsListRepository $repository, Request $request, JsonFormatter $jsonDate)
    {
        $sports = $request->query->get('sports');
        $sportslist = (isset($sports) ? explode(',',$sports) : null);

        $params = [
            'date' => date("Y-m-d"),
            'sports' => $sportslist,
        ];

        $sports = $repository->findSports($params);

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers,$encoders);
        $jsonContent = $serializer->serialize($sports, 'json');
        $jsonFinal = $jsonDate->formatDate($jsonContent);
        $response = new Response($jsonFinal);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
