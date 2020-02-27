<?php


namespace App\Service;


class RequestFilters
{
    public function RequestFilters($request,$geo = false) : array
    {
        $day = getdate ();
        $keys = ['price','terrace','openAfter','happyAfter'];
        if ($geo) {
            $keysgeo = ['lat','lon'];
            $keys = array_merge($keys,$keysgeo);
        };

        $params = [];
        foreach ($keys as $key) {
            $value = $request->query->get($key);
            if ($value != null) {
                $params[$key] = $value;
            }
        }
        $params['day'] = ($day['wday'] === 0) ? 7 : "%".$day['wday']."%";
        $params['currentTime'] = date("H:i:s");

        return $params;
    }
}