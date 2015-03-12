<?php

namespace TwitterCountKeyword\Tests;

use TwitterCountKeyword\Service\TwitterResponseParseService;

class TwitterResponseParseServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testParseResponseWithoutKeywords()
    {
        $service = new TwitterResponseParseService();

        $tweet = json_decode(
            '{"tweets":
                {
                   "created_at":"Wed Mar 11 16:27:38 +0000 2015",
                   "id":575694580579880960,
                   "id_str":"575694580579880960",
                   "text":"Making friends on Jury Duty. http:\/\/t.co\/bMUvcEfnRg",
                   "source":"\u003Ca href=\"http:\/\/twitter.com\" rel=\"nofollow\"\u003ETwitter Web Client\u003C\/a\u003E",
                   "truncated":false,
                   "in_reply_to_status_id":null,
                   "in_reply_to_status_id_str":null,
                   "in_reply_to_user_id":null,
                   "in_reply_to_user_id_str":null,
                   "in_reply_to_screen_name":null,
                   "user":{
                      "id":115485051,
                      "id_str":"115485051",
                      "name":"Conan O Brien",
                      "screen_name":"ConanOBrien",
                      "location":"Los Angeles",
                      "profile_location":null,
                      "description":"The voice of the people. Sorry, people.",
                      "url":"http:\/\/t.co\/2MenU2MTOS",
                      "entities":{
                         "url":{
                            "urls":[
                               {
                                  "url":"http:\/\/t.co\/2MenU2MTOS",
                                  "expanded_url":"http:\/\/teamcoco.com",
                                  "display_url":"teamcoco.com",
                                  "indices":[
                                     0,
                                     22
                                  ]
                               }
                            ]
                         },
                         "description":{
                            "urls":[

                            ]
                         }
                      },
                      "protected":false,
                      "followers_count":15356034,
                      "friends_count":1,
                      "listed_count":90013,
                      "created_at":"Thu Feb 18 20:17:16 +0000 2010",
                      "favourites_count":0,
                      "utc_offset":-28800,
                      "time_zone":"Alaska",
                      "geo_enabled":false,
                      "verified":true,
                      "statuses_count":1976,
                      "lang":"en",
                      "contributors_enabled":false,
                      "is_translator":false,
                      "is_translation_enabled":true,
                      "profile_background_color":"FFFFFF",
                      "profile_background_image_url":"http:\/\/pbs.twimg.com\/profile_background_images\/875682230\/6957e7d6efdd57c670277fce65043e40.jpeg",
                      "profile_background_image_url_https":"https:\/\/pbs.twimg.com\/profile_background_images\/875682230\/6957e7d6efdd57c670277fce65043e40.jpeg",
                      "profile_background_tile":false,
                      "profile_image_url":"http:\/\/pbs.twimg.com\/profile_images\/728337241\/conan_4cred_normal.jpg",
                      "profile_image_url_https":"https:\/\/pbs.twimg.com\/profile_images\/728337241\/conan_4cred_normal.jpg",
                      "profile_link_color":"0084B4",
                      "profile_sidebar_border_color":"FFFFFF",
                      "profile_sidebar_fill_color":"C0DFEC",
                      "profile_text_color":"333333",
                      "profile_use_background_image":true,
                      "default_profile":false,
                      "default_profile_image":false,
                      "following":null,
                      "follow_request_sent":null,
                      "notifications":null
                   },
                   "geo":null,
                   "coordinates":null,
                   "place":null,
                   "contributors":null,
                   "retweet_count":99,
                   "favorite_count":417,
                   "entities":{
                      "hashtags":[

                      ],
                      "symbols":[

                      ],
                      "user_mentions":[

                      ],
                      "urls":[
                         {
                            "url":"http:\/\/t.co\/bMUvcEfnRg",
                            "expanded_url":"http:\/\/bit.ly\/1b2dZ26",
                            "display_url":"bit.ly\/1b2dZ26",
                            "indices":[
                               29,
                               51
                            ]
                         }
                      ]
                   },
                   "favorited":false,
                   "retweeted":false,
                   "possibly_sensitive":false,
                   "lang":"en"
                }
            }
            ',
            true
        );

        $expectedResponse = array();

        $formatedArray = $service->parseResponse($tweet);

        $this->assertEquals($expectedResponse, $formatedArray);
    }

    public function testParseResponseWithKeywords()
    {
        $service = new TwitterResponseParseService();

        $tweet = json_decode(
            '{"tweets":
                {
                   "created_at":"Wed Mar 11 22:28:27 +0000 2015",
                   "id":575785382811320320,
                   "id_str":"575785382811320320",
                   "text":"Campeonato Nacional, 21.\u00aa jornada \/ Portuguese League, matchday 21: #FCPORTO FIDELIDADE-TURQUEL, 8-0 (final) http:\/\/t.co\/VY2vzdE8Ca",
                   "source":"\u003Ca href=\"http:\/\/twitter.com\" rel=\"nofollow\"\u003ETwitter Web Client\u003C\/a\u003E",
                   "truncated":false,
                   "in_reply_to_status_id":null,
                   "in_reply_to_status_id_str":null,
                   "in_reply_to_user_id":null,
                   "in_reply_to_user_id_str":null,
                   "in_reply_to_screen_name":null,
                   "user":{
                      "id":21390674,
                      "id_str":"21390674",
                      "name":"FC Porto",
                      "screen_name":"FCPorto",
                      "location":"Drag\u00e3o, Porto, Portugal",
                      "profile_location":null,
                      "description":"Twitter oficial do FC Porto. \/ FC Porto s official account. #FCPorto",
                    "url":"http:\/\/t.co\/OKA9l7a09g",
                      "entities":{
                        "url":{
                            "urls":[
                               {
                                   "url":"http:\/\/t.co\/OKA9l7a09g",
                                  "expanded_url":"http:\/\/www.fcporto.pt\/",
                                  "display_url":"fcporto.pt",
                                  "indices":[
                                   0,
                                   22
                               ]
                               }
                            ]
                         },
                         "description":{
                            "urls":[

                            ]
                         }
                      },
                      "protected":false,
                      "followers_count":389233,
                      "friends_count":32,
                      "listed_count":1432,
                      "created_at":"Fri Feb 20 11:43:03 +0000 2009",
                      "favourites_count":23,
                      "utc_offset":0,
                      "time_zone":"Lisbon",
                      "geo_enabled":false,
                      "verified":true,
                      "statuses_count":16819,
                      "lang":"pt",
                      "contributors_enabled":false,
                      "is_translator":false,
                      "is_translation_enabled":false,
                      "profile_background_color":"002C6D",
                      "profile_background_image_url":"http:\/\/pbs.twimg.com\/profile_background_images\/16418834\/header__twitter.gif",
                      "profile_background_image_url_https":"https:\/\/pbs.twimg.com\/profile_background_images\/16418834\/header__twitter.gif",
                      "profile_background_tile":false,
                      "profile_image_url":"http:\/\/pbs.twimg.com\/profile_images\/555688380634124288\/yCnqKh2__normal.jpeg",
                      "profile_image_url_https":"https:\/\/pbs.twimg.com\/profile_images\/555688380634124288\/yCnqKh2__normal.jpeg",
                      "profile_banner_url":"https:\/\/pbs.twimg.com\/profile_banners\/21390674\/1425244259",
                      "profile_link_color":"01509B",
                      "profile_sidebar_border_color":"01509B",
                      "profile_sidebar_fill_color":"FFFFFF",
                      "profile_text_color":"01509B",
                      "profile_use_background_image":true,
                      "default_profile":false,
                      "default_profile_image":false,
                      "following":null,
                      "follow_request_sent":null,
                      "notifications":null
                   },
                "geo":null,
                "coordinates":null,
                "place":null,
                "contributors":null,
                "retweet_count":24,
                "favorite_count":39,
                "entities":{
                "hashtags":[
                {
                "text":"FCPORTO",
                "indices":[
                68,
                76
                ]
                }
                ],
                "symbols":[

                ],
                      "user_mentions":[

                ],
                      "urls":[

                ],
                      "media":[
                         {
                             "id":575785381221761024,
                            "id_str":"575785381221761024",
                            "indices":[
                             109,
                             131
                         ],
                            "media_url":"http:\/\/pbs.twimg.com\/media\/B_2ZwOqWAAAaCwG.png",
                            "media_url_https":"https:\/\/pbs.twimg.com\/media\/B_2ZwOqWAAAaCwG.png",
                            "url":"http:\/\/t.co\/VY2vzdE8Ca",
                            "display_url":"pic.twitter.com\/VY2vzdE8Ca",
                            "expanded_url":"http:\/\/twitter.com\/FCPorto\/status\/575785382811320320\/photo\/1",
                            "type":"photo",
                            "sizes":{
                             "small":{
                                 "w":340,
                                  "h":340,
                                  "resize":"fit"
                               },
                               "large":{
                                 "w":1024,
                                  "h":1024,
                                  "resize":"fit"
                               },
                               "thumb":{
                                 "w":150,
                                  "h":150,
                                  "resize":"crop"
                               },
                               "medium":{
                                 "w":600,
                                  "h":600,
                                  "resize":"fit"
                               }
                            }
                         }
                      ]
                   },
                   "extended_entities":{
                    "media":[
                         {
                             "id":575785381221761024,
                            "id_str":"575785381221761024",
                            "indices":[
                             109,
                             131
                         ],
                            "media_url":"http:\/\/pbs.twimg.com\/media\/B_2ZwOqWAAAaCwG.png",
                            "media_url_https":"https:\/\/pbs.twimg.com\/media\/B_2ZwOqWAAAaCwG.png",
                            "url":"http:\/\/t.co\/VY2vzdE8Ca",
                            "display_url":"pic.twitter.com\/VY2vzdE8Ca",
                            "expanded_url":"http:\/\/twitter.com\/FCPorto\/status\/575785382811320320\/photo\/1",
                            "type":"photo",
                            "sizes":{
                             "small":{
                                 "w":340,
                                  "h":340,
                                  "resize":"fit"
                               },
                               "large":{
                                 "w":1024,
                                  "h":1024,
                                  "resize":"fit"
                               },
                               "thumb":{
                                 "w":150,
                                  "h":150,
                                  "resize":"crop"
                               },
                               "medium":{
                                 "w":600,
                                  "h":600,
                                  "resize":"fit"
                               }
                            }
                         }
                      ]
                   },
                   "favorited":false,
                   "retweeted":false,
                   "possibly_sensitive":false,
                   "lang":"es"
                }
            }
            ',
            true
        );

        $expectedResponse = array(0 => 'FCPORTO,1');

        $formatedArray = $service->parseResponse($tweet);

        $this->assertEquals($expectedResponse, $formatedArray);
    }
}
