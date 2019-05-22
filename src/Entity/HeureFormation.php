<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HeureFormationRepository")
 */
class HeureFormation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $heureformation_nb;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureformationNb(): ?float
    {
        return $this->heureformation_nb;
    }

    public function setHeureformationNb(float $heureformation_nb): self
    {
        $this->heureformation_nb = $heureformation_nb;

        return $this;
    }
}
