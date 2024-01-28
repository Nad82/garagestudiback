<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as assert;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'horaires:item']),
        new GetCollection(normalizationContext: ['groups' => 'horaires:list'])
    ],
    paginationEnabled: false,
)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['horaires:item', 'horaires:list'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[assert\NotBlank(message: 'Veuillez saisir les horaires d\'ouverture')]
    #[assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Les horaires d\'ouverture doivent contenir au moins 2 caractères',
        maxMessage: 'Les horaires d\'ouverture ne doivent pas dépasser 50 caractères'
    )]
    #[Groups(['horaires:item', 'horaires:list'])]
    private ?string $lundi = null;

    #[ORM\Column(length: 50)]
    #[assert\NotBlank(message: 'Veuillez saisir les horaires d\'ouverture')]
    #[assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Les horaires d\'ouverture doivent contenir au moins 2 caractères',
        maxMessage: 'Les horaires d\'ouverture ne doivent pas dépasser 50 caractères'
    )]
    #[Groups(['horaires:item', 'horaires:list'])]
    private ?string $mardi = null;

    #[ORM\Column(length: 50)]
    #[assert\NotBlank(message: 'Veuillez saisir les horaires d\'ouverture')]
    #[assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Les horaires d\'ouverture doivent contenir au moins 2 caractères',
        maxMessage: 'Les horaires d\'ouverture ne doivent pas dépasser 50 caractères'
    )]
    #[Groups(['horaires:item', 'horaires:list'])]
    private ?string $mercredi = null;

    #[ORM\Column(length: 50)]
    #[assert\NotBlank(message: 'Veuillez saisir les horaires d\'ouverture')]
    #[assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Les horaires d\'ouverture doivent contenir au moins 2 caractères',
        maxMessage: 'Les horaires d\'ouverture ne doivent pas dépasser 50 caractères'
    )]
    #[Groups(['horaires:item', 'horaires:list'])]
    private ?string $jeudi = null;

    #[ORM\Column(length: 50)]
    #[assert\NotBlank(message: 'Veuillez saisir les horaires d\'ouverture')]
    #[assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Les horaires d\'ouverture doivent contenir au moins 2 caractères',
        maxMessage: 'Les horaires d\'ouverture ne doivent pas dépasser 50 caractères'
    )]
    #[Groups(['horaires:item', 'horaires:list'])]
    private ?string $vendredi = null;

    #[ORM\Column(length: 50)]
    #[assert\NotBlank(message: 'Veuillez saisir les horaires d\'ouverture')]
    #[assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Les horaires d\'ouverture doivent contenir au moins 2 caractères',
        maxMessage: 'Les horaires d\'ouverture ne doivent pas dépasser 50 caractères'
    )]
    #[Groups(['horaires:item', 'horaires:list'])]
    private ?string $samedi = null;

    #[ORM\Column(length: 50)]
    #[assert\NotBlank(message: 'Veuillez saisir les horaires d\'ouverture')]
    #[assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Les horaires d\'ouverture doivent contenir au moins 2 caractères',
        maxMessage: 'Les horaires d\'ouverture ne doivent pas dépasser 50 caractères'
    )]
    #[Groups(['horaires:item', 'horaires:list'])]
    private ?string $dimanche = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLundi(): ?string
    {
        return $this->lundi;
    }

    public function setLundi(string $lundi): static
    {
        $this->lundi = $lundi;

        return $this;
    }

    public function getMardi(): ?string
    {
        return $this->mardi;
    }

    public function setMardi(string $mardi): static
    {
        $this->mardi = $mardi;

        return $this;
    }

    public function getMercredi(): ?string
    {
        return $this->mercredi;
    }

    public function setMercredi(string $mercredi): static
    {
        $this->mercredi = $mercredi;

        return $this;
    }

    public function getJeudi(): ?string
    {
        return $this->jeudi;
    }

    public function setJeudi(string $jeudi): static
    {
        $this->jeudi = $jeudi;

        return $this;
    }

    public function getVendredi(): ?string
    {
        return $this->vendredi;
    }

    public function setVendredi(string $vendredi): static
    {
        $this->vendredi = $vendredi;

        return $this;
    }

    public function getSamedi(): ?string
    {
        return $this->samedi;
    }

    public function setSamedi(string $samedi): static
    {
        $this->samedi = $samedi;

        return $this;
    }

    public function getDimanche(): ?string
    {
        return $this->dimanche;
    }

    public function setDimanche(string $dimanche): static
    {
        $this->dimanche = $dimanche;

        return $this;
    }
}
