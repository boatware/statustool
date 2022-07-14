<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $hex = null;

    #[ORM\Column]
    private ?int $r = null;

    #[ORM\Column]
    private ?int $g = null;

    #[ORM\Column]
    private ?int $b = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHex(): ?string
    {
        return $this->hex;
    }

    public function setHex(string $hex): self
    {
        $this->hex = $hex;

        return $this;
    }

    public function getR(): ?int
    {
        return $this->r;
    }

    public function setR(int $r): self
    {
        $this->r = $r;

        return $this;
    }

    public function getG(): ?int
    {
        return $this->g;
    }

    public function setG(int $g): self
    {
        $this->g = $g;

        return $this;
    }

    public function getB(): ?int
    {
        return $this->b;
    }

    public function setB(int $b): self
    {
        $this->b = $b;

        return $this;
    }
}
