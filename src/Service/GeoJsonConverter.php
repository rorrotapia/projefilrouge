<?php

namespace App\Service;

class GeoJsonConverter
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
                    "name" => $value['name'],
                    "priceLevel" => $value['priceLevel'],
                    "rating" => $value['rating'],
                    "city" => $value['city'],
                    "cp" => $value['cp'],
                    "address" => $value['address'],
                    "metro" => $value['metro'],
                    "priceNormal" => $value['priceNormal'],
                    "priceHappy" => $value['priceHappy'],
                    "terrace" => $value['terrace'],
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
}