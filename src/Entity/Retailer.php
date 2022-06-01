<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\Entity;


use Asdoria\SyliusRetailerPlugin\Model\RetailerInterface;
use Asdoria\SyliusRetailerPlugin\Traits\CodeTrait;
use Asdoria\SyliusRetailerPlugin\Traits\NamingTrait;
use Asdoria\SyliusRetailerPlugin\Traits\ResourceTrait;
use Asdoria\SyliusRetailerPlugin\Traits\RetailerGroupTrait;

/**
 * Class Retailer
 * @package Asdoria\SyliusRetailerPlugin\Entity
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class Retailer implements RetailerInterface
{
    use NamingTrait;
    use CodeTrait;
    use ResourceTrait;
    use RetailerGroupTrait;
    protected ?string $street = null;
    protected ?string $city = null;
    protected ?string $countryCode = null;
    protected ?string $postcode = null;
    protected ?float $latitude = null;
    protected ?float $longitude = null;
    protected ?int $distance = null;
    protected ?string $phoneNumber = null;

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string|null
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * @param string|null $postcode
     */
    public function setPostcode(?string $postcode): void
    {
        $this->postcode = $postcode;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     */
    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     */
    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return int|null
     */
    public function getDistance(): ?int
    {
        return $this->distance;
    }

    /**
     * @param int|null $distance
     */
    public function setDistance(?int $distance): void
    {
        $this->distance = $distance;
    }

    public function getPath(): ?string
    {
        return $this->getRetailerGroup()->getPath();
    }
}
