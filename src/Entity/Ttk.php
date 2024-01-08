<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TtkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TtkRepository::class)]
#[ApiResource]
class Ttk
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
