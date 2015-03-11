<?php

namespace TwitterCountKeyword\Service;

use TwitterCountKeyword\Helper\TwitterServiceHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

/**
 * Class TwitterService
 * @package TwitterCountKeyword\Service
 */
class TwitterService
{
    const APP_ONLY_AUTH = 'https://api.twitter.com/oauth2/token';
    const USER_TIMELINE = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    const NUMBER_OF_TWEETS = 100;

    /**
     * @var TwitterServiceHelper
     */
    protected $helper;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string $encodedApiKeyAndApiSecret
     */
    protected $encodedApiKeyAndApiSecret;

    /**
     * @var string $encodedApiKeyAndApiSecret
     */
    protected $encodedApiKeyAndApiSecretBase64;

    /**
     * @var string $accessToken
     */
    protected $accessToken;

    /**
     * @param $apiKey
     * @param $apiSecret
     */
    public function __construct($apiKey, $apiSecret)
    {
        if (isset($apiKey) && isset($apiSecret)) {
            $this->httpClient = new Client();
            $this->encodedApiKeyAndApiSecret = TwitterServiceHelper::encodeParams($apiKey, $apiSecret);
            $this->encodedApiKeyAndApiSecretBase64 = TwitterServiceHelper::encodeParamsBase64($apiKey, $apiSecret);
        } else {
            throw new \InvalidArgumentException('Twitter credentials not set when starting TwitterService');
        }
    }

    public function getLatestTweets($twitterUsername)
    {
        $this->authenticate();
        $request = new Request(
            'GET',
            self::USER_TIMELINE . '?count=' . self::NUMBER_OF_TWEETS . '&screen_name=' . $twitterUsername
        );
        $request->setHeader('Authorization', 'Bearer ' . $this->accessToken);
        $response = $this->httpClient->send($request);
        if ($response->getStatusCode() == 200) {
            return $response->json();
        } else {
            return null;
        }
    }

    private function authenticate()
    {
        if (!$this->isAuthenticated()) {
            $this->retrieveBearerToken();
        }
    }

    /**
     * @return boolean
     */
    private function isAuthenticated()
    {
        return isset($this->accessToken);
    }

    private function retrieveBearerToken()
    {
        $request = $this->httpClient->createRequest('POST', self::APP_ONLY_AUTH);
        $request->addHeaders(
            [
                'Authorization' =>  'Basic ' . $this->encodedApiKeyAndApiSecretBase64,
                'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
            ]
        );
        $request->setBody(Stream::factory('grant_type=client_credentials'));
        $this->processBearerResponse($this->httpClient->send($request));
    }

    /**
     * @param Response $response
     */
    private function processBearerResponse($response)
    {
        if ($response->getStatusCode() == 200) {
            $jsonObject = $response->json();
            if ($jsonObject['token_type'] == 'bearer') {
                $this->accessToken = $jsonObject['access_token'];
            }
        }
    }
}
