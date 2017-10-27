Undefined
=========
How to get ready ?
------------------

1. First copy the `parameters.yml.dist` to `parameters.yml` 

2. use `composer install` to install all required bundle

3. use `npm install && npm install -g bower && npm install -g gulp`
 
4. Setting Permissions (Linux OS Only) :
    * ``HTTPDUSER= `ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1``
    * ``setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var``
    * ``setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var``
    * ``chown -R `whoami`:www-data var``


What's inside?
--------------

The projet runs on PHP 7.0 and Symfony 3.3

  * This project respects [the best practices](http://symfony.com/doc/current/best_practices/index.html) of Symfony and [the PSR standards](http://symfony.com/doc/current/contributing/code/standards.html)

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**](https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html) - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**](https://symfony.com/doc/3.0/book/doctrine.html) - Adds support for the Doctrine ORM

  * [**TwigBundle**](https://symfony.com/doc/3.0/book/templating.html) - Adds support for the Twig templating engine

  * [**SecurityBundle**](https://symfony.com/doc/3.0/book/security.html) - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**](https://symfony.com/doc/3.0/cookbook/email.html) - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**](https://symfony.com/doc/3.0/cookbook/logging/monolog.html) - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**](https://symfony.com/doc/3.0/bundles/SensioGeneratorBundle/index.html) (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration
    
All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!


### DataFixtures
  
  * AppBundle

        php bin/console doctrine:fixtures:load --append --fixtures=src/AppBundle/DataFixtures/ORM/ProductsFixture.php
        php bin/console doctrine:fixtures:load --append --fixtures=src/AppBundle/DataFixtures/ORM/StorageFixture.php
  