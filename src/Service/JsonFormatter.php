<?php

namespace App\Service;

class JsonFormatter
{
    public function convertGeoJson($jsonData)
    {
        $original_data = json_decode($jsonData, true);
        $features = array();
        foreach($original_data as $key => $value) {

            $features[] = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'Point',
                    'coordinates' => [
                        $value['lon'],
                        $value['lat']
                    ],
                ),
                'properties' => [
                    "cluster" => false,
                    "id" => $value['id'],
                    "name" => $value['name'],
                    "address" => $value['address'],
                    "city" => $value['city'],
                    "cp" => $value['cp'],
                    "metro" => $value['metro'],
                    "priceNormal" => $value['price_normal'],
                    "priceHappy" => $value['price_happy'],
                    "priceCurrent" => ($value['pricecurrent'] === null) ? $value['price_normal'] : $value['pricecurrent'],
                    "distance" => $value['distance'] ?? null,
                    "terrace" => $value['terrace'],
                    "rating" => $value['rating'] ?? null,
                    "start_hour" => (isset($value['start_hour']['timestamp'])) ? date ( "H:i",$value['start_hour']['timestamp']) : null,
                    "end_hour" => (isset($value['end_hour']['timestamp'])) ? date ( "H:i",$value['end_hour']['timestamp']) : null,
                    "start_happy" => (isset($value['start_happy']['timestamp'])) ? date ( "H:i",$value['start_happy']['timestamp']) : null,
                    "end_happy" => (isset($value['end_happy']['timestamp'])) ? date ( "H:i",$value['end_happy']['timestamp']) : null,
                ],
            );
        }
        $new_data = array(
            'type' => 'FeatureCollection',
            'features' => $features,
        );

        $final_data = json_encode($new_data, JSON_PRETTY_PRINT);
        return $final_data;
    }

    public function formatDate($jsonData)
    {
        $original_data = json_decode($jsonData, true);

        foreach($original_data as &$value) {
            $value['horaire'] = date ( "H:i",$value['horaire']['timestamp']);
            $value['date'] = date ( "Y-m-d",$value['date']['timestamp']);
        }

        $final_data = json_encode($original_data, JSON_PRETTY_PRINT);
        return $final_data;
    }
}