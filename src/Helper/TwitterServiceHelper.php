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

    /**
     * @param $tweet
     * @return array
     */
    public static function getKeywords($tweet)
    {
        $returnArray = array();
        if (is_array($tweet)) {
            $hashtags = $tweet['entities']['hashtags'];
            if (!empty($hashtags)) {
                foreach ($hashtags as $hashtag) {
                    array_push($returnArray, $hashtag['text']);
                }
            }
        }

        return $returnArray;
    }

    /**
     * @param $keywords
     * @return array
     */
    public static function orderKeywords($keywords)
    {
        uasort(
            $keywords,
            function ($a, $b) {
                if ($a == $b) {
                    return 0;
                }
                return ($a < $b) ? -1 : 1;
            }
        );

        return array_reverse($keywords);
    }
}
