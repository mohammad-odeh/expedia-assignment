<?php

namespace App\Http\Helpers;

class ApiConsumingHelper
{
    /**
     * Build full URL with query strings
     * @param string $url
     * @param array[] $fields
     *
     * @return string
     */
    public static function buildQueryString($url, array $fields = [])
    {
        if (!empty($fields)) {
            foreach ($fields as $name => $value) {
                if (!empty($value)) {
                    $equalSign = '=';
                    if (in_array($name, ['minTripStartDate', 'maxTripStartDate'])) {
                        $equalSign = '=:';
                    }

                    $url .= '&' . $name . $equalSign . rawurlencode($value);
                }
            }
        }

        return $url;
    }

    /**
     * Do a "GET" curl request for given URL
     * @param string $url
     *
     * @return string
     */
    public static function callAPI($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }
}
