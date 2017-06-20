[![Build Status](https://travis-ci.org/cdwv/DatabaseDumperCommandBundle.svg)](https://github.com/cdwv/DatabaseDumperCommandBundle) [![Latest Stable Version](https://poser.pugx.org/cdwv/database-dumper-command-bundle/v/stable)](https://packagist.org/packages/cdwv/database-dumper-command-bundle) [![Total Downloads](https://poser.pugx.org/cdwv/database-dumper-command-bundle/downloads)](https://packagist.org/packages/cdwv/database-dumper-command-bundle) [![Latest Unstable Version](https://poser.pugx.org/cdwv/database-dumper-command-bundle/v/unstable)](https://packagist.org/packages/cdwv/database-dumper-command-bundle) [![License](https://poser.pugx.org/cdwv/database-dumper-command-bundle/license)](https://packagist.org/packages/cdwv/database-dumper-command-bundle)

Description
------------
Simple Symfony task for create backup/dump database

Installation
------------

```
composer require cdwv/database-dumper-command-bundle
```

add bundle to AppKernel:
```
new CodeWave\DatabaseDumperCommandBundle\CodeWaveDatabaseDumperCommandBundle(),
```

Run:
------------

```
    app/console cdwv:database:dump
```

## License
The MIT License &copy; 2015 - 2016