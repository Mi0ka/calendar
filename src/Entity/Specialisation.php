<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialisationRepository")
 */
class Specialisation
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
    private $specialisation_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="specialisation")
     */
    private $users;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Matiere", mappedBy="specialisation", cascade={"persist", "remove"})
     */
    private $matiere;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialisationName(): ?string
    {
        return $this->specialisation_name;
    }

    public function setSpecialisationName(string $specialisation_name): self
    {
        $this->specialisation_name = $specialisation_name;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setSpecialisation($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getSpecialisation() === $this) {
                $user->setSpecialisation(null);
            }
        }

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        // set (or unset) the owning side of the relation if necessary
        $newSpecialisation = $matiere === null ? null : $this;
        if ($newSpecialisation !== $matiere->getSpecialisation()) {
            $matiere->setSpecialisation($newSpecialisation);
        }

        return $this;
    }
}
