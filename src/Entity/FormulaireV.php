<?php

namespace App\Entity;

use App\Repository\FormulaireVRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as assert;

#[ORM\Entity(repositoryClass: FormulaireVRepository::class)]
class FormulaireV
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    #[Assert\NotBlank(message: 'Veuillez saisir votre nom')]
    #[assert\Length(
        min: 2,
        max: 30,
        minMessage: 'Le nom doit contenir au moins 2 caractères',
        maxMessage: 'Le nom ne doit pas dépasser 30 caractères'
    )]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    #[assert\NotBlank(message: 'Veuillez saisir votre prénom')]
    #[assert\Length(
        min: 2,
        max: 30,
        minMessage: 'Le prénom doit contenir au moins 2 caractères',
        maxMessage: 'Le prénom ne doit pas dépasser 30 caractères'
    )]
    private ?string $prenom = null;

    #[ORM\Column(length: 30)]
    #[assert\NotBlank(message: 'Veuillez saisir votre email')]
    #[assert\Email(message: 'Veuillez saisir un email valide')]
    #[assert\Length(
        min: 2,
        max: 30,
        minMessage: 'L\'email doit contenir au moins 2 caractères',
        maxMessage: 'L\'email ne doit pas dépasser 30 caractères'
    )]
    private ?string $email = null;

    #[ORM\Column(length: 15)]
    #[assert\NotBlank(message: 'Veuillez saisir votre numéro de téléphone')]
    #[assert\Length(
        min: 10,
        max: 15,
        minMessage: 'Le numéro de téléphone doit contenir au moins 10 caractères',
        maxMessage: 'Le numéro de téléphone ne doit pas dépasser 15 caractères'
    )]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message: 'Veuillez saisir votre message')]
    #[assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Le message doit contenir au moins 2 caractères',
        maxMessage: 'Le message ne doit pas dépasser 255 caractères'
    )]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'formulaireVs')]
    private ?Vehicule $vehicule = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): static
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}
