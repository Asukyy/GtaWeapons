<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\ComposantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ComposantRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'composant:item']),
        new GetCollection(normalizationContext: ['groups' => 'composant:list'])
    ],
    order: ['id' => 'ASC'],
    paginationEnabled: false,
)]
class Composant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['composant:list', 'composant:item'])]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Armes::class)]
    #[Groups(['composant:item'])]
    private Collection $armes;

    public function __construct()
    {
        $this->armes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Armes>
     */
    public function getArmes(): Collection
    {
        return $this->armes;
    }

    public function addArme(Armes $arme): self
    {
        if (!$this->armes->contains($arme)) {
            $this->armes->add($arme);
            $arme->setCategorie($this);
        }

        return $this;
    }

    public function removeArme(Armes $arme): self
    {
        if ($this->armes->removeElement($arme)) {
            // set the owning side to null (unless already changed)
            if ($arme->getCategorie() === $this) {
                $arme->setCategorie(null);
            }
        }

        return $this;
    }
}
