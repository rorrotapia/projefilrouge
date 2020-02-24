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
                        $value['lat'],
                        $value['lon']
                    ],
                ),
                'properties' => [
                    "id" => $value['id'],
                    "priceNormal" => $value['price_normal'],
                    "priceHappy" => $value['price_happy'],
                    "terrace" => $value['terrace'],
                    "start_hour" => (isset($value['start_hour']['timestamp'])) ? date ( "H:i",$value['start_hour']['timestamp']) : null,
                    "end_hour" => (isset($value['end_hour']['timestamp'])) ? date ( "H:i",$value['end_hour']['timestamp']) : null,
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
            $value['start_hour'] = date ( "H:i",$value['start_hour']['timestamp']);
            $value['end_hour'] = date ( "H:i",$value['end_hour']['timestamp']);
        }

        $final_data = json_encode($original_data, JSON_PRETTY_PRINT);
        return $final_data;
    }
}