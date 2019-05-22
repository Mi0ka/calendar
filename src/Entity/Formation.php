<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
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
    private $formation_name;

    /**
     * @ORM\Column(type="date")
     */
    private $formation_annee_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $formation_annee_fin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="formation")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormationName(): ?string
    {
        return $this->formation_name;
    }

    public function setFormationName(string $formation_name): self
    {
        $this->formation_name = $formation_name;

        return $this;
    }

    public function getFormationAnneeDebut(): ?\DateTimeInterface
    {
        return $this->formation_annee_debut;
    }

    public function setFormationAnneeDebut(\DateTimeInterface $formation_annee_debut): self
    {
        $this->formation_annee_debut = $formation_annee_debut;

        return $this;
    }

    public function getFormationAnneeFin(): ?\DateTimeInterface
    {
        return $this->formation_annee_fin;
    }

    public function setFormationAnneeFin(\DateTimeInterface $formation_annee_fin): self
    {
        $this->formation_annee_fin = $formation_annee_fin;

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
            $user->setFormation($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getFormation() === $this) {
                $user->setFormation(null);
            }
        }

        return $this;
    }
}
