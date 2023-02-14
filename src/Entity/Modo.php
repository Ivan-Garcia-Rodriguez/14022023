<?php

namespace App\Entity;

use App\Repository\ModoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModoRepository::class)]
class Modo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\OneToMany(mappedBy: 'modo', targetEntity: Mensaje::class)]
    private Collection $mensajes_id;

    public function __construct()
    {
        $this->mensajes_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection<int, Mensaje>
     */
    public function getMensajesId(): Collection
    {
        return $this->mensajes_id;
    }

    public function addMensajesId(Mensaje $mensajesId): self
    {
        if (!$this->mensajes_id->contains($mensajesId)) {
            $this->mensajes_id->add($mensajesId);
            $mensajesId->setModo($this);
        }

        return $this;
    }

    public function removeMensajesId(Mensaje $mensajesId): self
    {
        if ($this->mensajes_id->removeElement($mensajesId)) {
            // set the owning side to null (unless already changed)
            if ($mensajesId->getModo() === $this) {
                $mensajesId->setModo(null);
            }
        }

        return $this;
    }
}
