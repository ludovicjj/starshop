# StarShip

projet provenant de Symfonycast sur symfony 7 [voir](https://symfonycasts.com/screencast/symfony)

## php fixer

That'll show all the available commands
````
./vendor/bin/php-cs-fixer
````

Fix violation rules
````
./vendor/bin/php-cs-fixer fix
````

fix turbo-ux(My hero )
````
https://github.com/Kreyu/data-table-bundle/issues/42
````

## Cache
- Finding the Cache Service
````
php bin/console debug:autowiring cache
````

- List of available pools in our application
````
php bin/console cache:pool:list
````

- Clear specific cache pool
````
php bin/console cache:pool:clear cache.app
````

## Configuration de débogage

- Configuration actuelle
````
php bin/console debug:config framework
````
- Configuration complete
````
php bin/console config:dump framework
````

## ASSERT
Compiler manuellement les asset pour l'env PROD
````
php bin/console asset-map:compile
````