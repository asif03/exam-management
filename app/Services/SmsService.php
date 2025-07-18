<?php

namespace App\Services;

use GuzzleHttp\Client;

class SmsService
{
    protected $client;
    protected $apiUrl   = 'https://smsplus.sslwireless.com/api/v3/send-sms';
    protected $apiToken = 'psyuctcp-odtwox2d-thny9pof-ojkybti5-onhkqz61';
    protected $sid      = 'bcpsbrandapi';

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }

    public function sendSingleSms($params)
    {

        $params['api_token'] = $this->apiToken;
        $params['sid']       = $this->sid;

        $response = $this->client->post($this->apiUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ],
            'json'    => $params,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Send multiple SMS messages to different recipients.
     *
     * @param array $params
     * @return array
     */
    public function sendBulkSms($params)
    {
        $params['api_token'] = $this->apiToken;
        $params['sid']       = $this->sid;

        $response = $this->client->post($this->apiUrl . '/bulk', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ],
            'json'    => $params,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Send dynamic SMS messages.
     *
     * @param array $params
     * @return array
     */
    public function sendDynamicSms($params)
    {
        $params['api_token'] = $this->apiToken;
        $params['sid']       = $this->sid;

        $response = $this->client->post($this->apiUrl . '/dynamic', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ],
            'json'    => $params,
        ]);

        return json_decode($response->getBody(), true);
    }
}
