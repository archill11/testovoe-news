<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// #[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News {

  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;


  #[ORM\Column(length: 255)]
  private ?string $title = null;


  #[ORM\Column(length: 255)]
  private ?string $announcement = null;


  #[ORM\Column(length: 1500)]
  private ?string $poscription = null;


  #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
  private array $tags = [];


  #[ORM\Column(type: 'datetime_immutable')]
  private ?\DateTimeImmutable $published_at = null;


  public function __construct() {
    $this->published_at = new DateTimeImmutable();
  }

  public function getId(): ?int {
    return $this->id;
  }

  public function getTitle(): ?string {
    return $this->title;
  }

  public function setTitle(string $title): self {
    $this->title = $title;

    return $this;
  }

  public function getAnnouncement(): ?string {
    return $this->announcement;
  }

  public function setAnnouncement(string $announcement): self {
    $this->announcement = $announcement;

    return $this;
  }

  public function getPoscription(): ?string {
    return $this->poscription;
  }

  public function setPoscription(string $poscription): self {
    $this->poscription = $poscription;

    return $this;
  }

  public function getTags(): array {
    return $this->tags;
  }

  public function setTags(?array $tags): self {
    $this->tags = $tags;

    return $this;
  }

  public function getPublishedAt(): ?\DateTimeImmutable {
    return $this->published_at;
  }
}
