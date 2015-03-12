<?php

namespace TwitterCountKeyword\Tests;

use TwitterCountKeyword\Helper\TwitterServiceHelper;

class TwitterServiceHelperTest extends \PHPUnit_Framework_TestCase
{
    public function testEncodeParams()
    {
        $dummyApiKey = "K11mqDhx22BgbPGWI33vf00NB";

        $dummyApiSecret = "id22eZeld11WitKiUvTW9NoQyD8Hmt33Y1t2OTSt668hcc44I0";

        $expectedEncoding =
            "K11mqDhx22BgbPGWI33vf00NB:id22eZeld11WitKiUvTW9NoQyD8Hmt33Y1t2OTSt668hcc44I0";

        $encodedString = TwitterServiceHelper::encodeParams($dummyApiKey, $dummyApiSecret);

        $this->assertEquals($expectedEncoding, $encodedString);
    }

    public function testEncodeParamsBase64()
    {
        $dummyApiKey = "K11mqDhx22BgbPGWI33vf00NB";

        $dummyApiSecret = "id22eZeld11WitKiUvTW9NoQyD8Hmt33Y1t2OTSt668hcc44I0";

        $expectedEncoding =
            "SzExbXFEaHgyMkJnYlBHV0kzM3ZmMDBOQjppZDIyZVplbGQxMVdpdEtpVXZUVzlOb1F5RDhIbXQzM1kxdDJPVFN0NjY4aGNjNDRJMA==";

        $encodedString = TwitterServiceHelper::encodeParamsBase64($dummyApiKey, $dummyApiSecret);

        $this->assertEquals($expectedEncoding, $encodedString);
    }

    public function testOrderKeywords()
    {
        $arrayToOrder = array("test-1" => 2, "test-2" => 22, "test-3" => 1);
        $arrayExpected = array("test-2" => 22, "test-1" => 2, "test-3" => 1);

        $arrayOrdered = TwitterServiceHelper::orderKeywords($arrayToOrder);

        $this->assertEquals($arrayExpected, $arrayOrdered);
    }
}
