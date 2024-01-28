<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as assert;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
#[
    ApiResource(
        operations: [
            new Get(normalizationContext: ['groups' => 'vehicule:item']),
            new GetCollection(normalizationContext: ['groups' => 'vehicule:list'])
        ],
        paginationItemsPerPage: 3
    )
]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['vehicule:item', 'vehicule:list'])]
    private ?int $id = null;

    #[ORM\Column]
    #[assert\NotBlank(message: 'Veuillez saisir un prix')]
    #[assert\Length(
        min: 1,
        max: 10,
        minMessage: 'Le prix doit contenir au moins 1 caractère',
        maxMessage: 'Le prix ne doit pas dépasser 10 caractères'
    )]
    #[Groups(['vehicule:item', 'vehicule:list'])]
    private ?int $prix = null;

    #[ORM\Column]
    #[assert\NotBlank(message: 'Veuillez saisir une année')]
    #[assert\Length(
        min: 1,
        max: 4,
        minMessage: 'L\'année doit contenir au moins 1 caractère',
        maxMessage: 'L\'année ne doit pas dépasser 4 caractères'
    )]
    #[Groups(['vehicule:item', 'vehicule:list'])]
    private ?int $annee = null;

    #[ORM\Column]
    #[assert\NotBlank(message: 'Veuillez saisir un kilométrage')]
    #[assert\Length(
        min: 1,
        max: 10,
        minMessage: 'Le kilométrage doit contenir au moins 1 caractère',
        maxMessage: 'Le kilométrage ne doit pas dépasser 10 caractères'
    )]
    #[Groups(['vehicule:item', 'vehicule:list'])]
    private ?int $kilometrage = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message: 'Veuillez saisir des équipements')]
    #[assert\Length(
        min: 1,
        max: 255,
        minMessage: 'Les équipements doivent contenir au moins 1 caractère',
        maxMessage: 'Les équipements ne doivent pas dépasser 255 caractères'
    )]
    #[Groups(['vehicule:item', 'vehicule:list'])]
    private ?string $equipements = null;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: FormulaireV::class)]
    #[Groups(['vehicule:item', 'vehicule:list'])]
    private Collection $formulaireVs;

    #[ORM\OneToMany(
        mappedBy: 'vehicule',
        targetEntity: VehiculeImage::class,
        cascade: ['persist'],
        orphanRemoval: true
    )]
    #[Groups(['vehicule:item', 'vehicule:list'])]
    private Collection $imageFiles;

    public function __construct()
    {
        $this->formulaireVs = new ArrayCollection();
        $this->imageFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getEquipements(): ?string
    {
        return $this->equipements;
    }

    public function setEquipements(string $equipements): static
    {
        $this->equipements = $equipements;

        return $this;
    }

    /**
     * @return Collection<int, FormulaireV>
     */
    public function getFormulaireVs(): Collection
    {
        return $this->formulaireVs;
    }

    public function addFormulaireV(FormulaireV $formulaireV): static
    {
        if (!$this->formulaireVs->contains($formulaireV)) {
            $this->formulaireVs->add($formulaireV);
            $formulaireV->setVehicule($this);
        }

        return $this;
    }

    public function removeFormulaireV(FormulaireV $formulaireV): static
    {
        if ($this->formulaireVs->removeElement($formulaireV)) {
            // set the owning side to null (unless already changed)
            if ($formulaireV->getVehicule() === $this) {
                $formulaireV->setVehicule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, VehiculeImage>
     */
    public function getImageFiles(): Collection
    {
        return $this->imageFiles;
    }

    public function addImageFile(VehiculeImage $vehiculeImage): static
    {
        if (!$this->imageFiles->contains($vehiculeImage)) {
            $this->imageFiles->add($vehiculeImage);
            $vehiculeImage->setVehicule($this);
        }

        return $this;
    }

    public function removeImageFile(VehiculeImage $vehiculeImage): static
    {
        if ($this->imageFiles->removeElement($vehiculeImage)) {
            // set the owning side to null (unless already changed)
            if ($vehiculeImage->getVehicule() === $this) {
                $vehiculeImage->setVehicule(null);
            }
        }

        return $this;
    }
}
