<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificacion
 *
 * @ORM\Table(name="notificacion")
 * @ORM\Entity
 */
class Notificacion
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
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=false)
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
     * @ORM\Column(name="realinicio", type="date", nullable=true)
     */
    private $realinicio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="realfin", type="date", nullable=true)
     */
    private $realfin;

    /**
     * @var int
     *
     * @ORM\Column(name="plan", type="integer", nullable=false)
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

    public function getRealinicio(): ?\DateTimeInterface
    {
        return $this->realinicio;
    }

    public function setRealinicio(?\DateTimeInterface $realinicio): self
    {
        $this->realinicio = $realinicio;

        return $this;
    }

    public function getRealfin(): ?\DateTimeInterface
    {
        return $this->realfin;
    }

    public function setRealfin(?\DateTimeInterface $realfin): self
    {
        $this->realfin = $realfin;

        return $this;
    }

    public function getPlan(): ?int
    {
        return $this->plan;
    }

    public function setPlan(int $plan): self
    {
        $this->plan = $plan;

        return $this;
    }


}
