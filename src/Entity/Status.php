<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'statuses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Board $board = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $color = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?File $icon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBoard(): ?Board
    {
        return $this->board;
    }

    public function setBoard(?Board $board): self
    {
        $this->board = $board;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getIcon(): ?File
    {
        return $this->icon;
    }

    public function setIcon(?File $icon): self
    {
        $this->icon = $icon;

        return $this;
    }
}
