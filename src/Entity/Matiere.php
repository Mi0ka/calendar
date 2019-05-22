<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatiereRepository")
 */
class Matiere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $matiere_name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Specialisation", inversedBy="matiere", cascade={"persist", "remove"})
     */
    private $specialisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatiereName(): ?string
    {
        return $this->matiere_name;
    }

    public function setMatiereName(string $matiere_name): self
    {
        $this->matiere_name = $matiere_name;

        return $this;
    }

    public function getSpecialisation(): ?Specialisation
    {
        return $this->specialisation;
    }

    public function setSpecialisation(?Specialisation $specialisation): self
    {
        $this->specialisation = $specialisation;

        return $this;
    }
}
