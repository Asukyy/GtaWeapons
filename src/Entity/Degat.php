<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\DegatRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DegatRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'degat:item']),
        new GetCollection(normalizationContext: ['groups' => 'degat:list'])
    ],
    order: ['id' => 'ASC'],
    paginationEnabled: false,
)]
class Degat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['degat:list', 'degat:item'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'degats')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['degat:item'])]
    private ?Armes $armes = null;

    #[ORM\ManyToOne(inversedBy: 'degats')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['degat:item'])]
    private ?Partieducorps $partieducorps = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArmes(): ?Armes
    {
        return $this->armes;
    }

    public function setArmes(?Armes $armes): self
    {
        $this->armes = $armes;

        return $this;
    }

    public function getPartieducorps(): ?Partieducorps
    {
        return $this->partieducorps;
    }

    public function setPartieducorps(?Partieducorps $partieducorps): self
    {
        $this->partieducorps = $partieducorps;

        return $this;
    }
}
