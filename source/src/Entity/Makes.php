<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Makes
 */
#[ORM\Table(name: 'makes')]
#[ORM\Index(name: 'accept_manager', columns: ['accept_manager'])]
#[ORM\Index(name: 'image', columns: ['image'])]
#[ORM\Index(name: 'make_add_client_supplier_id', columns: ['make_add_client_supplier_id'])]
#[ORM\Index(name: 'publish', columns: ['publish'])]
#[ORM\Index(name: 'type', columns: ['type'])]
#[ORM\Index(name: 'make_name', columns: ['make_name'])]
#[ORM\Index(name: 'make_match_logo', columns: ['make_match_logo'])]
#[ORM\Index(name: 'publish_2', columns: ['publish', 'ebrp_status', 'accept_manager', 'make_match_logo'])]
#[ORM\Index(name: 'make_match_client_supplier_id', columns: ['make_match_client_supplier_id'])]
#[ORM\Index(name: 'is_orig', columns: ['is_orig'])]
#[ORM\Index(name: 'bitmap_state', columns: ['bitmap_state'])]
#[ORM\Index(name: 'make_logo', columns: ['make_logo', 'publish', 'ebrp_status', 'accept_manager'])]
#[ORM\Index(name: 'ebrp_status', columns: ['ebrp_status'])]
#[ORM\UniqueConstraint(name: 'make_logo_2', columns: ['make_logo'])]
#[ORM\UniqueConstraint(name: 'uniq_make_name', columns: ['make_name'])]
#[ORM\Entity(repositoryClass: 'App\Repository\MakesRepository')]
class Makes
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'make_logo', type: 'string', length: 4, nullable: false, options: ['fixed' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $makeLogo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'make_name', type: 'string', length: 60, nullable: true)]
    private $makeName;

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'is_orig', type: 'boolean', nullable: true)]
    private $isOrig = '0';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'link_catalog', type: 'string', length: 255, nullable: true)]
    private $linkCatalog;

    /**
     * @var string
     */
    #[ORM\Column(name: 'link_catalog_file', type: 'string', length: 255, nullable: false)]
    private $linkCatalogFile;

    /**
     * @var string
     */
    #[ORM\Column(name: 'link_site', type: 'string', length: 255, nullable: false)]
    private $linkSite;

    /**
     * @var bool|null
     */
    #[ORM\Column(name: 'publish', type: 'boolean', nullable: true)]
    private $publish = '0';

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'bitmap_state', type: 'integer', nullable: true)]
    private $bitmapState = '0';

    /**
     * @var bool
     */
    #[ORM\Column(name: 'type', type: 'boolean', nullable: false)]
    private $type;

    /**
     * @var bool
     */
    #[ORM\Column(name: 'ebrp_status', type: 'boolean', nullable: false)]
    private $ebrpStatus;

    /**
     * @var bool
     */
    #[ORM\Column(name: 'accept_manager', type: 'boolean', nullable: false)]
    private $acceptManager;

    /**
     * @var string
     */
    #[ORM\Column(name: 'make_match_logo', type: 'string', length: 4, nullable: false, options: ['fixed' => true])]
    private $makeMatchLogo;

    /**
     * @var string
     */
    #[ORM\Column(name: 'image', type: 'string', length: 90, nullable: false)]
    private $image;

    /**
     * @var int
     */
    #[ORM\Column(name: 'make_match_client_supplier_id', type: 'integer', nullable: false)]
    private $makeMatchClientSupplierId;

    /**
     * @var int
     */
    #[ORM\Column(name: 'make_add_client_supplier_id', type: 'integer', nullable: false)]
    private $makeAddClientSupplierId;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'updated_at', type: 'datetime', nullable: true)]
    private $updatedAt;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'emex_detail_example', type: 'string', length: 255, nullable: true)]
    private $emexDetailExample;

    /**
     * @var string
     */
    #[ORM\Column(name: 'emex_logo', type: 'string', length: 10, nullable: false)]
    private $emexLogo;

    /**
     * @var int
     */
    #[ORM\Column(name: 'deleted', type: 'integer', nullable: false)]
    private $deleted;

    public function getMakeLogo(): ?string
    {
        return $this->makeLogo;
    }

    public function getMakeName(): ?string
    {
        return $this->makeName;
    }

    public function setMakeName(?string $makeName): self
    {
        $this->makeName = $makeName;

        return $this;
    }

    public function getIsOrig(): ?bool
    {
        return $this->isOrig;
    }

    public function setIsOrig(?bool $isOrig): self
    {
        $this->isOrig = $isOrig;

        return $this;
    }

    public function getLinkCatalog(): ?string
    {
        return $this->linkCatalog;
    }

    public function setLinkCatalog(?string $linkCatalog): self
    {
        $this->linkCatalog = $linkCatalog;

        return $this;
    }

    public function getLinkCatalogFile(): ?string
    {
        return $this->linkCatalogFile;
    }

    public function setLinkCatalogFile(string $linkCatalogFile): self
    {
        $this->linkCatalogFile = $linkCatalogFile;

        return $this;
    }

    public function getLinkSite(): ?string
    {
        return $this->linkSite;
    }

    public function setLinkSite(string $linkSite): self
    {
        $this->linkSite = $linkSite;

        return $this;
    }

    public function getPublish(): ?bool
    {
        return $this->publish;
    }

    public function setPublish(?bool $publish): self
    {
        $this->publish = $publish;

        return $this;
    }

    public function getBitmapState(): ?int
    {
        return $this->bitmapState;
    }

    public function setBitmapState(?int $bitmapState): self
    {
        $this->bitmapState = $bitmapState;

        return $this;
    }

    public function getType(): ?bool
    {
        return $this->type;
    }

    public function setType(bool $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEbrpStatus(): ?bool
    {
        return $this->ebrpStatus;
    }

    public function setEbrpStatus(bool $ebrpStatus): self
    {
        $this->ebrpStatus = $ebrpStatus;

        return $this;
    }

    public function getAcceptManager(): ?bool
    {
        return $this->acceptManager;
    }

    public function setAcceptManager(bool $acceptManager): self
    {
        $this->acceptManager = $acceptManager;

        return $this;
    }

    public function getMakeMatchLogo(): ?string
    {
        return $this->makeMatchLogo;
    }

    public function setMakeMatchLogo(string $makeMatchLogo): self
    {
        $this->makeMatchLogo = $makeMatchLogo;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getMakeMatchClientSupplierId(): ?int
    {
        return $this->makeMatchClientSupplierId;
    }

    public function setMakeMatchClientSupplierId(int $makeMatchClientSupplierId): self
    {
        $this->makeMatchClientSupplierId = $makeMatchClientSupplierId;

        return $this;
    }

    public function getMakeAddClientSupplierId(): ?int
    {
        return $this->makeAddClientSupplierId;
    }

    public function setMakeAddClientSupplierId(int $makeAddClientSupplierId): self
    {
        $this->makeAddClientSupplierId = $makeAddClientSupplierId;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getEmexDetailExample(): ?string
    {
        return $this->emexDetailExample;
    }

    public function setEmexDetailExample(?string $emexDetailExample): self
    {
        $this->emexDetailExample = $emexDetailExample;

        return $this;
    }

    public function getEmexLogo(): ?string
    {
        return $this->emexLogo;
    }

    public function setEmexLogo(string $emexLogo): self
    {
        $this->emexLogo = $emexLogo;

        return $this;
    }

    public function getDeleted(): ?int
    {
        return $this->deleted;
    }

    public function setDeleted(int $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function isIsOrig(): ?bool
    {
        return $this->isOrig;
    }

    public function isPublish(): ?bool
    {
        return $this->publish;
    }

    public function isType(): ?bool
    {
        return $this->type;
    }

    public function isEbrpStatus(): ?bool
    {
        return $this->ebrpStatus;
    }

    public function isAcceptManager(): ?bool
    {
        return $this->acceptManager;
    }


}
