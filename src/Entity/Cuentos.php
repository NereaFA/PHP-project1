<?php

namespace App\Entity;

use App\Repository\CuentosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuentosRepository::class)]
class Cuentos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titulo = null;

    #[ORM\Column(length: 255)]
    private ?string $escritor = null;

    #[ORM\Column]
    private ?int $año = null;

    #[ORM\Column(length: 255)]
    private ?string $imagen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getEscritor(): ?string
    {
        return $this->escritor;
    }

    public function setEscritor(string $escritor): self
    {
        $this->escritor = $escritor;

        return $this;
    }

    public function getAño(): ?int
    {
        return $this->año;
    }

    public function setAño(int $año): self
    {
        $this->año = $año;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }
}
