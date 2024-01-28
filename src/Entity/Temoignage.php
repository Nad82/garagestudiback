<?php

namespace App\Entity;

use App\Repository\TemoignageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as assert;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: TemoignageRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'temoignage:read']),
        new GetCollection(
            normalizationContext: ['groups' => 'temoignage:list']
        ),
        new Post(denormalizationContext: ['groups' => 'temoignage:write'])
    ],
    paginationItemsPerPage: 3
)]
class Temoignage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    #[assert\NotBlank(message: 'Veuillez saisir votre nom')]
    #[assert\Length(
        min: 2,
        max: 30,
        minMessage: 'Le nom doit contenir au moins 2 caractères',
        maxMessage: 'Le nom ne doit pas dépasser 30 caractères'
    )]
    #[Groups('temoignage:read', 'temoignage:write', 'temoignage:list')]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    #[assert\NotBlank(message: 'Veuillez saisir votre prénom')]
    #[assert\Length(
        min: 2,
        max: 30,
        minMessage: 'Le prénom doit contenir au moins 2 caractères',
        maxMessage: 'Le prénom ne doit pas dépasser 30 caractères'
    )]
    #[Groups('temoignage:read', 'temoignage:write', 'temoignage:list')]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message: 'Veuillez saisir votre commentaire')]
    #[assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Le commentaire doit contenir au moins 2 caractères',
        maxMessage: 'Le commentaire ne doit pas dépasser 255 caractères'
    )]
    #[Groups('temoignage:read', 'temoignage:write', 'temoignage:list')]
    private ?string $commentaires = null;

    #[ORM\Column]
    #[assert\NotBlank(message: 'Veuillez saisir une note')]
    #[assert\Positive(message: 'Veuillez saisir une note positive')]
    #[assert\LessThanOrEqual(value: 5, message: 'Veuillez saisir une note inférieure ou égale à 5')]
    #[Groups('temoignage:read', 'temoignage:write', 'temoignage:list')]
    private ?int $notes = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    #[Groups('temoignage:read', 'temoignage:list')]
    private ?bool $actif = null;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(string $commentaires): static
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getNotes(): ?int
    {
        return $this->notes;
    }

    public function setNotes(int $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): static
    {
        $this->actif = $actif;

        return $this;
    }
}
