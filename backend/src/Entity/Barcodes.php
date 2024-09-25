<?php

namespace App\Entity;

use App\Repository\BarcodesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BarcodesRepository::class)]
class Barcodes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $brandName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commonName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionLanguage = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $gpcCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $internalSymbol = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastModificationDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $netContent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $netContentUnit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $packaging = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $productImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $productWebsite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $qualityDetails = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subBrandName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $targetMarket = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $variant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    public function setBrandName(?string $brandName): static
    {
        $this->brandName = $brandName;

        return $this;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function setCommonName(?string $commonName): static
    {
        $this->commonName = $commonName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDescriptionLanguage(): ?string
    {
        return $this->descriptionLanguage;
    }

    public function setDescriptionLanguage(?string $descriptionLanguage): static
    {
        $this->descriptionLanguage = $descriptionLanguage;

        return $this;
    }

    public function getGpcCode(): ?string
    {
        return $this->gpcCode;
    }

    public function setGpcCode(?string $gpcCode): static
    {
        $this->gpcCode = $gpcCode;

        return $this;
    }

    public function getInternalSymbol(): ?string
    {
        return $this->internalSymbol;
    }

    public function setInternalSymbol(?string $internalSymbol): static
    {
        $this->internalSymbol = $internalSymbol;

        return $this;
    }

    public function getLastModificationDate(): ?string
    {
        return $this->lastModificationDate;
    }

    public function setLastModificationDate(?string $lastModificationDate): static
    {
        $this->lastModificationDate = $lastModificationDate;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNetContent(): ?string
    {
        return $this->netContent;
    }

    public function setNetContent(?string $netContent): static
    {
        $this->netContent = $netContent;

        return $this;
    }

    public function getNetContentUnit(): ?string
    {
        return $this->netContentUnit;
    }

    public function setNetContentUnit(?string $netContentUnit): static
    {
        $this->netContentUnit = $netContentUnit;

        return $this;
    }

    public function getPackaging(): ?string
    {
        return $this->packaging;
    }

    public function setPackaging(?string $packaging): static
    {
        $this->packaging = $packaging;

        return $this;
    }

    public function getProductImage(): ?string
    {
        return $this->productImage;
    }

    public function setProductImage(?string $productImage): static
    {
        $this->productImage = $productImage;

        return $this;
    }

    public function getProductWebsite(): ?string
    {
        return $this->productWebsite;
    }

    public function setProductWebsite(?string $productWebsite): static
    {
        $this->productWebsite = $productWebsite;

        return $this;
    }

    public function getQualityDetails(): ?string
    {
        return $this->qualityDetails;
    }

    public function setQualityDetails(?string $qualityDetails): static
    {
        $this->qualityDetails = $qualityDetails;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getSubBrandName(): ?string
    {
        return $this->subBrandName;
    }

    public function setSubBrandName(?string $subBrandName): static
    {
        $this->subBrandName = $subBrandName;

        return $this;
    }

    public function getTargetMarket(): ?string
    {
        return $this->targetMarket;
    }

    public function setTargetMarket(?string $targetMarket): static
    {
        $this->targetMarket = $targetMarket;

        return $this;
    }

    public function getVariant(): ?string
    {
        return $this->variant;
    }

    public function setVariant(?string $variant): static
    {
        $this->variant = $variant;

        return $this;
    }
}
