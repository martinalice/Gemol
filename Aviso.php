<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aviso
 *
 * @ORM\Table(name="aviso")
 * @ORM\Entity
 */
class Aviso
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
     * @var int
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var int
     *
     * @ORM\Column(name="activopadre", type="integer", nullable=false)
     */
    private $activopadre;

    /**
     * @var int
     *
     * @ORM\Column(name="activohijo", type="integer", nullable=false)
     */
    private $activohijo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="criticidad", type="integer", nullable=false)
     */
    private $criticidad;

    /**
     * @var int|null
     *
     * @ORM\Column(name="plan", type="integer", nullable=true)
     */
    private $plan;

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getActivopadre(): ?int
    {
        return $this->activopadre;
    }

    public function setActivopadre(int $activopadre): self
    {
        $this->activopadre = $activopadre;

        return $this;
    }

    public function getActivohijo(): ?int
    {
        return $this->activohijo;
    }

    public function setActivohijo(int $activohijo): self
    {
        $this->activohijo = $activohijo;

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

    public function getCriticidad(): ?int
    {
        return $this->criticidad;
    }

    public function setCriticidad(int $criticidad): self
    {
        $this->criticidad = $criticidad;

        return $this;
    }

    public function getPlan(): ?int
    {
        return $this->plan;
    }

    public function setPlan(?int $plan): self
    {
        $this->plan = $plan;

        return $this;
    }


}
