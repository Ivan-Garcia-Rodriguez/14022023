<?php

namespace App\Entity;

use App\Repository\BandaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandaRepository::class)]
class Banda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $maximo = null;

    #[ORM\Column]
    private ?float $minimo = null;

    #[ORM\OneToMany(mappedBy: 'Banda', targetEntity: Mensaje::class)]
    private Collection $mensaje_id;

    public function __construct()
    {
        $this->mensaje_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaximo(): ?float
    {
        return $this->maximo;
    }

    public function setMaximo(float $maximo): self
    {
        $this->maximo = $maximo;

        return $this;
    }

    public function getMinimo(): ?float
    {
        return $this->minimo;
    }

    public function setMinimo(float $minimo): self
    {
        $this->minimo = $minimo;

        return $this;
    }

    /**
     * @return Collection<int, Mensaje>
     */
    public function getMensajeId(): Collection
    {
        return $this->mensaje_id;
    }

    public function addMensajeId(Mensaje $mensajeId): self
    {
        if (!$this->mensaje_id->contains($mensajeId)) {
            $this->mensaje_id->add($mensajeId);
            $mensajeId->setBanda($this);
        }

        return $this;
    }

    public function removeMensajeId(Mensaje $mensajeId): self
    {
        if ($this->mensaje_id->removeElement($mensajeId)) {
            // set the owning side to null (unless already changed)
            if ($mensajeId->getBanda() === $this) {
                $mensajeId->setBanda(null);
            }
        }

        return $this;
    }
}
