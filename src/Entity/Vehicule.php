<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\Column(length: 255)]
    private ?string $equipements = null;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: FormulaireV::class)]
    private Collection $formulaireVs;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: VehiculeImage::class)]
    private Collection $vehiculeImages;

    public function __construct()
    {
        $this->formulaireVs = new ArrayCollection();
        $this->vehiculeImages = new ArrayCollection();
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
    public function getVehiculeImages(): Collection
    {
        return $this->vehiculeImages;
    }

    public function addVehiculeImage(VehiculeImage $vehiculeImage): static
    {
        if (!$this->vehiculeImages->contains($vehiculeImage)) {
            $this->vehiculeImages->add($vehiculeImage);
            $vehiculeImage->setVehicule($this);
        }

        return $this;
    }

    public function removeVehiculeImage(VehiculeImage $vehiculeImage): static
    {
        if ($this->vehiculeImages->removeElement($vehiculeImage)) {
            // set the owning side to null (unless already changed)
            if ($vehiculeImage->getVehicule() === $this) {
                $vehiculeImage->setVehicule(null);
            }
        }

        return $this;
    }
}
