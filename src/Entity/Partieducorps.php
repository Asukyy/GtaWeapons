<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PartieducorpsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartieducorpsRepository::class)]
#[ApiResource]
class Partieducorps
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $multiplicateur = null;

    #[ORM\OneToMany(mappedBy: 'partieducorps', targetEntity: Degat::class)]
    private Collection $degats;

    public function __construct()
    {
        $this->degats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMultiplicateur(): ?float
    {
        return $this->multiplicateur;
    }

    public function setMultiplicateur(float $multiplicateur): static
    {
        $this->multiplicateur = $multiplicateur;

        return $this;
    }

    /**
     * @return Collection<int, Degat>
     */
    public function getDegats(): Collection
    {
        return $this->degats;
    }

    public function addDegat(Degat $degat): static
    {
        if (!$this->degats->contains($degat)) {
            $this->degats->add($degat);
            $degat->setPartieducorps($this);
        }

        return $this;
    }

    public function removeDegat(Degat $degat): static
    {
        if ($this->degats->removeElement($degat)) {
            // set the owning side to null (unless already changed)
            if ($degat->getPartieducorps() === $this) {
                $degat->setPartieducorps(null);
            }
        }

        return $this;
    }
}
