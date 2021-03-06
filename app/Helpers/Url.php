<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/5/18
 * Time: 7:51 AM
 */

namespace App\Helpers;



/**
 * Created by PhpStorm.
 * User: justin
 * Date: 25/07/17
 * Time: 16:00
 */


class Url
{
    public static function addParams(array $params = array(), $url = null)
    {
        if (is_null($url)) {
            $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }
        $parseUrl = parse_url($url); // mac dinh
        $query = isset($parseUrl['query']) ? $parseUrl['query'] : "";
//        dump($_SERVER['SERVER_NAME']);
//        dump($_SERVER['SERVER_PORT']); 8000
//        dd($_SERVER['HTTP_HOST']);
        if ($query) {
            parse_str($query, $parseQuery);
            $params = array_merge($parseQuery, $params);
        }
        ksort($params);

        $urlReturn = [
            isset($parseUrl['scheme']) ? $parseUrl['scheme'] : 'http',
            '://',
            $parseUrl['host'],':'.$parseUrl['port'],
            isset($parseUrl['path']) ? $parseUrl['path'] : '',
            '?',
            urldecode(http_build_query($params))
        ];
        return implode('', $urlReturn);
    }

    /**
     * LAY TAT CA CAC THAM SO DANG TRUY VAN TREN URL
     * @param array $params
     * @param null $url
     * @return array
     */
    public static function getParamRequestUri($params=[], $url = null)
    {
        if (is_null($url)) {
            $url = 'http://' . $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];
        }

        $parseUrl = parse_url($url);
        $query = isset($parseUrl['query']) ? $parseUrl['query'] : "";
        if ($query)
        {
            parse_str($query, $parseQuery);
            $params = array_merge($parseQuery, $params);
        }

        ksort($params);
        return $params;
    }
}