* **download composer**: curl -sS https://getcomposer.org/installer | php
* **install vendors and generate autoload**: php composer.phar install
* put your api_key and secret in config/parameters.yml
* **run command example**: app/console twitter:count:keyword --twitter:username=conanobrien
* **run tests**:
 * ./vendor/bin/phpunit tests/TwitterServiceHelperTest.php
 * ./vendor/bin/phpunit tests/TwitterResponseParseServiceTest.php
