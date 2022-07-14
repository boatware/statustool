<?php

namespace App\Entity;

use App\Repository\BoardSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoardSettingsRepository::class)]
class BoardSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'boardSettings', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Board $board = null;

    #[ORM\Column]
    private ?bool $display_status_title = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoard(): ?Board
    {
        return $this->board;
    }

    public function setBoard(Board $board): self
    {
        $this->board = $board;

        return $this;
    }

    public function isDisplayStatusTitle(): ?bool
    {
        return $this->display_status_title;
    }

    public function setDisplayStatusTitle(bool $display_status_title): self
    {
        $this->display_status_title = $display_status_title;

        return $this;
    }
}
