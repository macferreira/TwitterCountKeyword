<?php
namespace TwitterCountKeyword\Service;

use TwitterCountKeyword\Helper\TwitterServiceHelper;

/**
 * Class TwitterResponseParseService
 * @package TwitterCountKeyword\Service
 */
class TwitterResponseParseService
{
    /**
     * @param $response
     * @return array
     */
    public function parseResponse($response)
    {
        $keywordsArray = array();

        foreach ($response as $tweet) {
            $tempArray = TwitterServiceHelper::getKeywords($tweet);

            foreach ($tempArray as $tempArrayValue) {
                array_push($keywordsArray, $tempArrayValue);
            }
        }

        return $this->formatResponse(TwitterServiceHelper::orderKeywords(array_count_values($keywordsArray)));
    }

    /**
     * @param $responseArray
     * @return array
     */
    private function formatResponse($responseArray)
    {
        $returnArray = array();
        foreach ($responseArray as $finalKey => $finalVal) {
            $returnArray[] = $finalKey . ',' . $finalVal;
        }

        return $returnArray;
    }
}
