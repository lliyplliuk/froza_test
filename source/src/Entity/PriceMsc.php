<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * PriceMsc
 */
#[ORM\Table(name: 'price_MSC')]
#[ORM\Index(name: 'make_logo_2', columns: ['make_logo', 'detail_num'])]
#[ORM\Index(name: 'detail_num_supplier', columns: ['detail_num_supplier'])]
#[ORM\Index(name: 'logo_date', columns: ['supplier_logo', 'date'])]
#[ORM\Index(name: 'price_list_to_ftp', columns: ['direction', 'supplier_logo', 'make_logo'])]
#[ORM\Index(name: 'date', columns: ['date'])]
#[ORM\Index(name: 'price_list_to_ftp_2', columns: ['direction', 'supplier_logo'])]
#[ORM\Index(name: 'detail_num', columns: ['detail_num'])]
#[ORM\Index(name: 'need_check_idx', columns: ['need_chek'])]
#[ORM\Index(name: 'price_next_idx', columns: ['price_next'])]
#[ORM\UniqueConstraint(name: 'unq_price', columns: ['direction', 'supplier_logo', 'make_logo', 'detail_num'])]
#[ORM\Entity(repositoryClass: 'App\Repository\PriceMscRepository')]
class PriceMsc
{

    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'direction', type: 'string', length: 10, nullable: false, options: ['fixed' => true])]
    private $direction = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'supplier_logo', type: 'string', length: 5, nullable: false)]
    private $supplierLogo = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'make_logo', type: 'string', length: 4, nullable: false)]
    private $makeLogo = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'detail_num', type: 'string', length: 50, nullable: false)]
    private $detailNum = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'detail_num_supplier', type: 'string', length: 50, nullable: false)]
    private $detailNumSupplier = '';

    /**
     * @var int
     */
    #[ORM\Column(name: 'quantity', type: 'integer', nullable: false)]
    private $quantity;

    /**
     * @var int
     */
    #[ORM\Column(name: 'quantity_lot', type: 'integer', nullable: false)]
    private $quantityLot = '0';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'price', type: 'decimal', precision: 20, scale: 4, nullable: true)]
    private $price;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'price_prev', type: 'decimal', precision: 20, scale: 4, nullable: true)]
    private $pricePrev;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'price_next', type: 'decimal', precision: 20, scale: 4, nullable: true)]
    private $priceNext;

    /**
     * @var bool
     */
    #[ORM\Column(name: 'need_chek', type: 'boolean', nullable: true)]
    private $needCheck;

    /**
     * @var string
     */
    #[ORM\Column(name: 'price_hand', type: 'decimal', precision: 20, scale: 4, nullable: false, options: ['default' => '0.0000'])]
    private $priceHand = '0.0000';

    /**
     * @var string
     */
    #[ORM\Column(name: 'comment', type: 'string', length: 80, nullable: false)]
    private $comment = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'comment_manager', type: 'string', length: 80, nullable: false)]
    private $commentManager = '';

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'date', type: 'date', nullable: false)]
    private $date;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'date_quant', type: 'date', nullable: false)]
    private $dateQuant;

    /**
     * @var int
     */
    #[ORM\Column(name: 'delivery_time', type: 'integer', nullable: false)]
    private $deliveryTime = '0';

    /**
     * @var string
     */
    #[ORM\Column(name: 'make_name_supplier', type: 'string', length: 50, nullable: false)]
    private $makeNameSupplier;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'updated_at', type: 'datetime', nullable: true)]
    private $updatedAt;

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function getSupplierLogo(): ?string
    {
        return $this->supplierLogo;
    }

    public function getMakeLogo(): ?string
    {
        return $this->makeLogo;
    }

    public function getDetailNum(): ?string
    {
        return $this->detailNum;
    }

    public function getDetailNumSupplier(): ?string
    {
        return $this->detailNumSupplier;
    }

    public function setDetailNumSupplier(string $detailNumSupplier): self
    {
        $this->detailNumSupplier = $detailNumSupplier;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantityLot(): ?int
    {
        return $this->quantityLot;
    }

    public function setQuantityLot(int $quantityLot): self
    {
        $this->quantityLot = $quantityLot;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceHand(): ?string
    {
        return $this->priceHand;
    }

    public function setPriceHand(string $priceHand): self
    {
        $this->priceHand = $priceHand;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCommentManager(): ?string
    {
        return $this->commentManager;
    }

    public function setCommentManager(string $commentManager): self
    {
        $this->commentManager = $commentManager;

        return $this;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateQuant(): ?DateTimeInterface
    {
        return $this->dateQuant;
    }

    public function setDateQuant(DateTimeInterface $dateQuant): self
    {
        $this->dateQuant = $dateQuant;

        return $this;
    }

    public function getDeliveryTime(): ?int
    {
        return $this->deliveryTime;
    }

    public function setDeliveryTime(int $deliveryTime): self
    {
        $this->deliveryTime = $deliveryTime;

        return $this;
    }

    public function getMakeNameSupplier(): ?string
    {
        return $this->makeNameSupplier;
    }

    public function setMakeNameSupplier(string $makeNameSupplier): self
    {
        $this->makeNameSupplier = $makeNameSupplier;

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

    public function setDirection(?string $direction): self
    {
        $this->direction = $direction;
        return $this;
    }

    public function setSupplierLogo(?string $sLogo): self
    {
        $this->supplierLogo = $sLogo;
        return $this;
    }

    public function setMakeLogo(?string $mLogo): self
    {
        $this->makeLogo = $mLogo;
        return $this;
    }

    public function setDetailNum(?string $num): self
    {
        $this->detailNum=$num;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPricePrev(): ?string
    {
        return $this->pricePrev;
    }

    /**
     * @param string|null $pricePrev
     */
    public function setPricePrev(?string $pricePrev): self
    {
        $this->pricePrev = $pricePrev;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPriceNext(): ?string
    {
        return $this->priceNext;
    }

    /**
     * @param string|null $priceNext
     */
    public function setPriceNext(?string $priceNext): self
    {
        $this->priceNext = $priceNext;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNeedCheck(): bool
    {
        return $this->needCheck;
    }

    /**
     * @param bool $needCheck
     */
    public function setNeedCheck(bool $needCheck): self
    {
        $this->needCheck = $needCheck;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}
