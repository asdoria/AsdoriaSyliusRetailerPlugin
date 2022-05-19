<p align="center">
</p>


<h1 align="center">Asdoria Retailer Bundle</h1>

<p align="center">Simply Manage Retailer into sylius shop</p>

## Features

+ Create groups of retailer using your own images
+ Create retailer using your own images

<div style="max-width: 75%; height: auto; margin: auto">

</div>

 

## Installation

---
2. run `composer require asdoria/sylius-retailer-plugin`


3. Add the bundle in `config/bundles.php`. You must put it ABOVE `SyliusGridBundle`

```PHP
Asdoria\SyliusRetailerPlugin\AsdoriaSyliusRetailerPlugin::class => ['all' => true],
[...]
Sylius\Bundle\GridBundle\SyliusGridBundle::class => ['all' => true],
```

4. Import routes in `config/routes.yaml`

```yaml
asdoria_retailer:
    resource: "@AsdoriaSyliusRetailerPlugin/Resources/config/routing.yaml"
    prefix: /admin
```

5. Import config in `config/packages/_sylius.yaml`
```yaml
imports:
    - { resource: "@AsdoriaSyliusRetailerPlugin/Resources/config/config.yaml"}
```

7. run `php bin/console do:mi:mi` to update the database schema

## Usage

