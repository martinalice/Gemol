<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Orden
 *
 * @ORM\Table(name="orden")
 * @ORM\Entity
 */
class Orden
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
     * @ORM\Column(name="tipo", type="integer", nullable=false)
     */
    private $tipo;

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
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="criticidad", type="integer", nullable=false)
     */
    private $criticidad;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="programainicio", type="date", nullable=true)
     * @Assert\GreaterThanOrEqual("today")
     */
    private $programainicio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="programafin", type="date", nullable=true)
     * @Assert\GreaterThanOrEqual(propertyPath="programainicio")
     */
    private $programafin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="plan", type="integer", nullable=true)
     */
    private $plan;

    /**
     * @var int|null
     *
     * @ORM\Column(name="costoordentotal", type="integer", nullable=true)
     */
    private $costoordentotal;

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

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): self
    {
        $this->tipo = $tipo;

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

    public function getProgramainicio(): ?\DateTimeInterface
    {
        return $this->programainicio;
    }

    public function setProgramainicio(?\DateTimeInterface $programainicio): self
    {
        $this->programainicio = $programainicio;

        return $this;
    }

    public function getProgramafin(): ?\DateTimeInterface
    {
        return $this->programafin;
    }

    public function setProgramafin(?\DateTimeInterface $programafin): self
    {
        $this->programafin = $programafin;

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

    public function getCostoordentotal(): ?int
    {
        return $this->costoordentotal;
    }

    public function setCostoordentotal(?int $costoordentotal): self
    {
        $this->costoordentotal = $costoordentotal;

        return $this;
    }


}
