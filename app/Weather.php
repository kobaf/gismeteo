<?php

namespace App;

require_once "Helpers/phpQuery.php";

use Illuminate\Database\Eloquent\Model;
use \phpQuery;


class Weather extends Model
{

    private
        $observation,
        $temp,
        $windDir,
        $windSpeed,
        $pressure,
        $humidity,
        $src;

    protected $guarded = [];

    // Parses the weather from site
    public function retrieve()
    {
        $curl = curl_init();

        if (!$curl) {
            die("СURL handle error."); // NG: should be handled by laravel exceptions
        }

        curl_setopt($curl, CURLOPT_URL, $this->src);

        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2)');

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return result, not status

        $html = curl_exec($curl);

        if (curl_errno($curl))
        {
            echo 'CURL error: ' . curl_error($curl); // NG: should be handled by laravel exceptions
            exit();
        }

        curl_close($curl);

        $gotHtml = phpQuery::newDocument($html, $contentType = null);

        $selector = pq($gotHtml)->find("div.section.higher");

        $this->observation = $selector->find("dl.cloudness")->find("td")->text();

        $this->temp = str_before($selector->find("div.temp")->find("dd.value.m_temp.c")->html(), '<');

        $this->windSpeed = $selector->find("div.wicon.wind")->find("dd.value.m_wind.ms")->html();

        $this->windDir = $selector->find("div.wicon.wind")->find("dt")->text();

        $this->pressure = $selector->find("div.wicon.barp")->find("dd.value.m_press.hpa")->text();

        $this->humidity = $selector->find("div.wicon.hum")->text();
    }

    // Returns array of weather data
    public function getCurrent()
    {
        return
            [
                'observation'=>$this->observation,
                'temp'=>$this->temp,
                'wind_dir'=>$this->windDir,
                'wind_speed'=>$this->windSpeed,
                'pressure'=>$this->pressure,
                'humidity'=>$this->humidity
            ];
    }

    public function __construct($source)
    {
        parent::__construct();
        $this->src = $source;
        $this->retrieve();
    }

}
