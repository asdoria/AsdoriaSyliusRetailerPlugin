<p align="center">
</p>

![Example of a product's pictograms customization](doc/asdoria.jpg)

<h1 align="center">Asdoria Facet Filter Bundle</h1>

<p align="center">Ce plugin permet de lier des facettes spécifiques à des resources spécifiques dans Sylius.

Sylius a une notion d'attributs de produits, d'options de produits et autres. Cependant, il n'y a pas de moyen intégré pour rendre ces attributs, options, taxons uniquement pertinents pour les produits dans des catégories spécifiques. Cela peut être un problème si/quand vous voulez permettre aux visiteurs de filtrer le catalogue de produits en utilisant ces facettes. Ce plugin permet de lier des attributs spécifiques, des options et d'autres facettes à des taxons u autre ressoures, ce qui vous permet de décider plus facilement quels filtres afficher à quel endroit.
</p>

## Features

+ Create groups of facet using your own images
+ Create facet filter using your own images
+ Easily create the collection of facet 
+ Attache the facet filter on your categorie or other resources

<div style="max-width: 75%; height: auto; margin: auto">

![Example of a product's pictograms customization](doc/product.jpg)

</div>


<div style="max-width: 75%; height: auto; margin: auto">

Toggling the pictograms to display for a product
![Example of a product's pictograms customization](doc/product.gif)

</div>





## Installation

---
2. run `composer require asdoria/sylius-facet-filter-plugin`


3. Add the bundle in `config/bundles.php`. You must put it ABOVE `SyliusGridBundle`

```PHP
Asdoria\SyliusRetailerPlugin\AsdoriaSyliusRetailerPlugin::class => ['all' => true],
[...]
Sylius\Bundle\GridBundle\SyliusGridBundle::class => ['all' => true],
```

4. Import routes in `config/routes.yaml`

```yaml
asdoria_facet_filter:
    resource: "@AsdoriaSyliusRetailerPlugin/Resources/config/routing.yaml"
    prefix: /admin
```

5. Import config in `config/packages/_sylius.yaml`
```yaml
imports:
    - { resource: "@AsdoriaSyliusRetailerPlugin/Resources/config/config.yaml"}
```
5. owerride grid config in `sylius_shop_product.yaml`
```yaml
sylius_grid:
    grids:
        sylius_shop_product:
            filters:
                facets_filters:
                    type: facets_filters
                    label: false
                    options:
                        targetOwner: taxon
```
6. In `App/Entity/Taxonomy/Taxon.php`.

```PHP

// ...

use Asdoria\SyliusRetailerPlugin\Model\Aware\RetailerCodeAwareInterface;
use Asdoria\SyliusRetailerPlugin\Traits\RetailerCodeTrait;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Taxon as BaseTaxon;
use Sylius\Component\Taxonomy\Model\TaxonTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_taxon")
 */
class Taxon extends BaseTaxon implements RetailerCodeAwareInterface
{
    use RetailerCodeTrait;

    protected function createTranslation(): TaxonTranslationInterface
    {
        return new TaxonTranslation();
    }
}
```
6. In templates/bundles/SyliusAdminBundle/Taxon/_form.html.twig`.

```twig

{% from '@SyliusAdmin/Macro/translationForm.html.twig' import translationFormWithSlug %}

<div class="ui segment">
    {{ form_errors(form) }}
    <div class="three fields">
        {{ form_row(form.code) }}
        {{ form_row(form.parent) }}
        {{ form_row(form.facetFilterCode) }}
    </div>
    <div class="fields">
        {{ form_row(form.enabled) }}
    </div>
</div>
{{ translationFormWithSlug(form.translations, '@SyliusAdmin/Taxon/_slugField.html.twig', taxon) }}

{% include '@SyliusAdmin/Taxon/_media.html.twig' %}

```
7. run `php bin/console do:mi:mi` to update the database schema

## Usage

1. In the back office, under `Catalog`, enter `Pictogram Groups`. Create a group using a unique code
2. In `Pictogram Groups`, click `Managing Pictograms` to create/delete images for this group
3. Go to a product's edit page, then click the `Pictograms` tab in the sidebar. Here you can toggle which pictograms you wish to display



