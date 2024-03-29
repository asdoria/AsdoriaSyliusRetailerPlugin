<p align="center">
</p>


<h1 align="center">Asdoria Retailer Bundle</h1>

<p align="center">Simply Retailer's Managment into Sylius Shop</p>

## Features

+ Create Major Retailer using your own images
+ Create custom retailers with precise geographical coordinates and contact informations
+ Create your own interactive map with Leaflet to show all your retailers

<div style="max-width: 75%; height: auto; margin: auto">
 
![Leaflet Map](doc/map.png)

</div>

 Retailers Group and custom retailer creation:
<div style="max-width: 75%; height: auto; margin: auto">

![Example of major retailer and custom retailer creation](doc/create-retailersgroup-group.gif)

</div>

 

## Installation

---
1. run `composer require asdoria/sylius-retailer-plugin`


2. Add the bundle in `config/bundles.php`. You must put it ABOVE `SyliusGridBundle`

```PHP
Asdoria\SyliusRetailerPlugin\AsdoriaSyliusRetailerPlugin::class => ['all' => true],
[...]
Sylius\Bundle\GridBundle\SyliusGridBundle::class => ['all' => true],
```

3. Import routes in `config/routes.yaml`

```yaml
asdoria_retailer:
    resource: "@AsdoriaSyliusRetailerPlugin/Resources/config/routing.yaml"
```

4. Import config in `config/packages/_sylius.yaml`
```yaml
imports:
    - { resource: "@AsdoriaSyliusRetailerPlugin/Resources/config/config.yaml"}
```

5. run `php bin/console do:mi:mi` to update the database schema

6. Edit your defaults settings in `@AsdoriaSyliusRetailerPlugin/Resources/views/Shop/Retailer/index.html.twig` :
```
config = {
    'ajaxRoute' : path('asdoria_shop_ajax_retailer_index', {'criteria[search][value]': 0}),
    'imageRoute': 'media/cache/resolve/sylius_small/',
    'default' : {
        'latitude' : 45.564601,
        'longitude' : 5.917781,
    },
    'searchField': Street, Zipcode, City',
    'findButton' : 'Find a retailer',
    'emptyResultsMessage': 'No results..',
}
 ```

## Demo

You can see the result for the user here with a cap: [here](https://demo-sylius.asdoria.fr/en_US/retailers). <br>
If you want to try to create retailers, go on [the admin authentication page](https://demo-sylius.asdoria.fr/admin/) and connect with:
> **Login:** asdoria <br>
> **Password:** asdoria

 Then go on ["Retailers Managment" in the back office](https://demo-sylius.asdoria.fr/admin/retailer-groups/) and follow usage lines below.

Note that we have developed several other open source plugins for Sylius, whose demos and documentation are listed on the [following page](https://asdoria.github.io/).

## Usage

1. In the back office, under "Retailers Managment", create a Major Retailer with a unique name.
2. Click on "Manage retailers", and on "Add a new retailer" button.
3. Fill the fields, and put unique longitude and latitude.
4. Access to your map at `/en_US/retailers` (depends on your Sylius locale).
