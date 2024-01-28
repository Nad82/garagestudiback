<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as assert;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
#[
    ApiResource(
        operations: [
            new Get(normalizationContext: ['groups' => 'services:item']),
            new GetCollection(normalizationContext: ['groups' => 'services:list'])
        ],
        paginationEnabled: false,
    )
]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['services:item', 'services:list'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[assert\NotBlank(message: 'Veuillez saisir une description')]
    #[assert\Length(
        min: 2,
        max: 255,
        minMessage: 'La description doit contenir au moins 2 caractères',
        maxMessage: 'La description ne doit pas dépasser 255 caractères'
    )]
    #[Groups(['services:item', 'services:list'])]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
