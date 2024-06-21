<?php

namespace Esimcard\EsimcardSdk\client_http;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class Api
{

    private $client;

    public function __construct($token, $timeout = 60)
    {
        $url = "https://esimcard.com/api/developer/";

        $clientConfig = [
            "base_uri" => $url,
            "timeout" => $timeout,
            "headers" => [
                "Authorization" => 'Bearer ' . $token,
                "Accept" => "application/json"
            ]
        ];

        $this->client = new Client($clientConfig);

        try {
            $type = $this->checkToken();
            if (isset($type->extension)) {
                $this->updateClientBaseUri($url . $type->extension . '/');
            } else {
                throw new \Exception('Token check failed: ' . $type);
            }
        } catch (RequestException $e) {
            throw new \Exception('Failed to connect to the server: ' . $e->getMessage());
        }
    }

    private function updateClientBaseUri($newBaseUri)
    {
        $config = $this->client->getConfig();
        $config['base_uri'] = $newBaseUri;
        $this->client = new Client($config);
    }

    public function checkToken()
    {

        return $this->makeRequest(__CLASS__ . "." . __FUNCTION__,  "check-token", "GET");
    }

    public function makeRequest(
        $caller,
        $uri,
        $method,
        $json = [],
        $query = [],
        $headers = []
    ) {
        try {
            $caller = (string)$caller;
            Log::info("$caller Request ", [
                $uri, $method, $json, $query, $headers
            ]);

            $options = [
                "headers" => $headers,
                "query" => $query
            ];

            if (!empty($json)) $options["json"] = $json;
            $response = $this->client->request($method, $uri, $options);
            $body = $response->getBody()->getContents();
            Log::info("$caller Response: " . $body);
            return json_decode($body);
        } catch (ClientException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() == 401) {
                // Handle 401 Unauthorized error here
                // For example, you can throw a custom exception
                return response()->json([
                    'status' =>false,
                    'message' => "Unauthorized"
                ],401);
            }

            $body = $e->getResponse()->getBody()->getContents();
            Log::error("$caller Exception: " . $body);
            Log::error("$caller Message Exception Message: " . $e->getMessage());
            return json_decode($body);

        } catch (Exception  $e) {
            Log::error("$caller Exception: " . $e->getMessage());
            return response()->json([
                'status' =>false,
                'message' =>$e->getMessage()
            ]);
        }
    }
}
