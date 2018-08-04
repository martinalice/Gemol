<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activopadre
 *
 * @ORM\Table(name="activopadre")
 * @ORM\Entity
 */
class Activopadre
{
    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=100, nullable=false)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string", length=100, nullable=false)
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="etc", type="string", length=500, nullable=false)
     */
    private $etc;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=500, nullable=false)
     */
    private $estado;

    /**
     * @var int
     *
     * @ORM\Column(name="criticidad", type="integer", nullable=false)
     */
    private $criticidad;

    /**
     * @var int
     *
     * @ORM\Column(name="costo", type="integer", nullable=false)
     */
    private $costo;

    public function getNumero(): ?int
    {
        return $this->numero;
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

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getEtc(): ?string
    {
        return $this->etc;
    }

    public function setEtc(string $etc): self
    {
        $this->etc = $etc;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCriticidad(): ?int
    {
        return $this->criticidad;
    }

    public function setCriticidad(int $criticidad): self
    {
        $this->criticidad = $criticidad;

        return $this;
    }

    public function getCosto(): ?int
    {
        return $this->costo;
    }

    public function setCosto(int $costo): self
    {
        $this->costo = $costo;

        return $this;
    }


}
