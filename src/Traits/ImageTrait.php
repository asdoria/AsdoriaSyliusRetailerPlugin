<?php

namespace Asdoria\SyliusRetailerPlugin\Traits;

use Sylius\Component\Core\Model\ImageInterface;

trait ImageTrait
{
    protected ?ImageInterface $image = null;

    /**
     * @return ImageInterface|null
     */
    public function getImage(): ?ImageInterface
    {
        return $this->image;
    }

    /**
     * @param ImageInterface|null $image
     */
    public function setImage(?ImageInterface $image): void
    {
        $image->setOwner($this);
        $this->image = $image;
    }


}
