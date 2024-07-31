<?php

namespace App\Services;

use GuzzleHttp\Client;

class CalendarificService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('CALENDARIFIC_API_KEY');
    }

    public function getHolidays($country, $year)
    {
        $response = $this->client->get('https://calendarific.com/api/v2/holidays', [
            'query' => [
                'api_key' => $this->apiKey,
                'country' => $country,
                'year' => $year,
            ]
        ]);

        return json_decode($response->getBody(), true)['response']['holidays'];
    }
}
