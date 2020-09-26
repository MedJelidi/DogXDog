<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DogRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(attributes={"pagination_items_per_page"=10},
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"dog:read", "dog:item:get"}},
 *          },
 *          "put", "delete"
 *     },
 *      normalizationContext={"groups"={"dog:read"}},
 *     denormalizationContext={"groups"={"dog:write"}})
 * @ApiFilter(SearchFilter::class, properties={"breed": "partial"})
 * @ApiFilter(RangeFilter::class, properties={"id": "partial"})
 * @ORM\Entity(repositoryClass=DogRepository::class)
 */
class Dog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"dog:read", "user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"dog:read", "dog:write", "user:read"})
     */
    private $breed;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"dog:read", "dog:write", "user:read"})
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     * @Groups({"dog:read", "dog:write", "user:read"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="dogs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"dog:read", "dog:write"})
     */
    private $owner;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"dog:read", "dog:write", "user:read"})
     */
    private $age;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"dog:read", "dog:write", "user:read"})
     */
    private $ready;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"dog:read", "dog:write", "user:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"dog:read", "dog:write", "user:read"})
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"dog:read", "dog:write", "user:read"})
     */
    private $location;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBreed(): ?string
    {
        return $this->breed;
    }

    public function setBreed(string $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getReady(): ?bool
    {
        return $this->ready;
    }

    public function setReady(bool $ready): self
    {
        $this->ready = $ready;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }
}
