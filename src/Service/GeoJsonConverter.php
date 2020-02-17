<?php

namespace App\Service;

class GeoJsonConverter
{
    public function convertGeoJson($data)
    {
        //Si $res n'est pas vide, on lance la boucle
        if (isset($data)) {
            $geojson = array(
                'type' => 'FeatureCollection',
                'features' => array()
            );
            //output each row of the data, format line as csv and write to file pointer
            foreach ($data as $row) {
                $properties = clone $row;
                unset($properties->lat);
                unset($properties->lon);
                $feature = array(
                    'type' => 'Feature',
                    'geometry' => array(
                        'type' => 'Point',
                        'coordinates' => array(
                            $row->lon,
                            $row->lat
                        )
                    ),
                    'properties' => (array) $properties
                );

                array_push($geojson['features'], $feature);
            }
        }

        $geojson = json_encode($geojson);

        return $geojson;
    }
}