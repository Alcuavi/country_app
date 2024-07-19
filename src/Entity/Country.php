<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column]
    private ?int $population = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $flag = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $region = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subregion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $capital = null;

    #[ORM\Column(nullable: true)]
    private ?float $area = null;

    #[ORM\Column(nullable: true)]
    private ?array $languages = null;

    #[ORM\Column(nullable: true)]
    private ?array $borders = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nativeName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numericCode = null;

    #[ORM\Column(nullable: true)]
    private ?array $currencies = null;

    #[ORM\Column(nullable: true)]
    private ?array $timezones = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
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

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(int $population): static
    {
        $this->population = $population;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(?string $flag): static
    {
        $this->flag = $flag;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getSubregion(): ?string
    {
        return $this->subregion;
    }

    public function setSubregion(?string $subregion): static
    {
        $this->subregion = $subregion;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(?string $capital): static
    {
        $this->capital = $capital;

        return $this;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function setArea(?float $area): static
    {
        $this->area = $area;

        return $this;
    }

    public function getLanguages(): ?array
    {
        return $this->languages;
    }

    public function setLanguages(?array $languages): static
    {
        $this->languages = $languages;

        return $this;
    }

    public function getBorders(): ?array
    {
        return $this->borders;
    }

    public function setBorders(?array $borders): static
    {
        $this->borders = $borders;

        return $this;
    }

    public function getNativeName(): ?string
    {
        return $this->nativeName;
    }

    public function setNativeName(?string $nativeName): static
    {
        $this->nativeName = $nativeName;

        return $this;
    }

    public function getNumericCode(): ?string
    {
        return $this->numericCode;
    }

    public function setNumericCode(?string $numericCode): static
    {
        $this->numericCode = $numericCode;

        return $this;
    }

    public function getCurrencies(): ?array
    {
        return $this->currencies;
    }

    public function setCurrencies(?array $currencies): static
    {
        $this->currencies = $currencies;

        return $this;
    }

    public function getTimezones(): ?array
    {
        return $this->timezones;
    }

    public function setTimezones(?array $timezones): static
    {
        $this->timezones = $timezones;

        return $this;
    }
}
