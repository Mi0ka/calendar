<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScheduleRepository")
 */
class Schedule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $scheduler_heure_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $scheduler_heure_fin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchedulerHeureDebut(): ?\DateTimeInterface
    {
        return $this->scheduler_heure_debut;
    }

    public function setSchedulerHeureDebut(\DateTimeInterface $scheduler_heure_debut): self
    {
        $this->scheduler_heure_debut = $scheduler_heure_debut;

        return $this;
    }

    public function getSchedulerHeureFin(): ?\DateTimeInterface
    {
        return $this->scheduler_heure_fin;
    }

    public function setSchedulerHeureFin(\DateTimeInterface $scheduler_heure_fin): self
    {
        $this->scheduler_heure_fin = $scheduler_heure_fin;

        return $this;
    }
}
