<?php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\ArmesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArmesRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'armes:item']),
        new GetCollection(normalizationContext: ['groups' => 'armes:list'])
    ],
    order: ['nom' => 'ASC'],
    paginationEnabled: false,
)]
class Armes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['armes:list', 'armes:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Groups(['armes:list', 'armes:item'])]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'armes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['armes:item'])]
    private ?Composant $categorie = null;

    #[ORM\OneToMany(mappedBy: 'armes', targetEntity: Degat::class)]
    #[Groups(['armes:item'])]
    private Collection $degats;

    public function __construct()
    {
        $this->degats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCategorie(): ?Composant
    {
        return $this->categorie;
    }

    public function setCategorie(?Composant $categorie): static
    {
        $this->categorie = $categorie;

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
            $degat->setArmes($this);
        }

        return $this;
    }

    public function removeDegat(Degat $degat): static
    {
        if ($this->degats->removeElement($degat)) {
            // set the owning side to null (unless already changed)
            if ($degat->getArmes() === $this) {
                $degat->setArmes(null);
            }
        }

        return $this;
    }
}
