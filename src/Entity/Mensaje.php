<?php

namespace App\Entity;

use App\Repository\MensajeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensajeRepository::class)]
class Mensaje
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne(inversedBy: 'mensaje')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Participante $participante = null;

    #[ORM\ManyToOne(inversedBy: 'mensajes_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Modo $modo = null;

    #[ORM\ManyToOne(inversedBy: 'mensaje_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Banda $Banda = null;

    #[ORM\Column]
    private ?bool $validado = null;

    #[ORM\Column(length: 255)]
    private ?string $id_Juezz = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getParticipante(): ?Participante
    {
        return $this->participante;
    }

    public function setParticipante(?Participante $participante): self
    {
        $this->participante = $participante;

        return $this;
    }

    public function getModo(): ?Modo
    {
        return $this->modo;
    }

    public function setModo(?Modo $modo): self
    {
        $this->modo = $modo;

        return $this;
    }

    public function getBanda(): ?Banda
    {
        return $this->Banda;
    }

    public function setBanda(?Banda $Banda): self
    {
        $this->Banda = $Banda;

        return $this;
    }

    public function isValidado(): ?bool
    {
        return $this->validado;
    }

    public function setValidado(bool $validado): self
    {
        $this->validado = $validado;

        return $this;
    }

    public function getIdJuezz(): ?string
    {
        return $this->id_Juezz;
    }

    public function setIdJuezz(string $id_Juezz): self
    {
        $this->id_Juezz = $id_Juezz;

        return $this;
    }
}
