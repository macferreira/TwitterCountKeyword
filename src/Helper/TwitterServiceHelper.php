<?php

namespace TwitterCountKeyword\Helper;

/**
 * Class TwitterServiceHelper
 * @package TwitterCountKeyword\Helper
 */
class TwitterServiceHelper
{
    /**
     * @param $apiKey
     * @param $apiSecret
     * @return string
     */
    public static function encodeParams($apiKey, $apiSecret)
    {
        return $apiKey . ':' . $apiSecret;
    }

    /**
     * @param $apiKey
     * @param $apiSecret
     * @return string
     */
    public static function encodeParamsBase64($apiKey, $apiSecret)
    {
        return base64_encode($apiKey . ':' . $apiSecret);
    }
}
