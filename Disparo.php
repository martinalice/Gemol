<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disparo
 *
 * @ORM\Table(name="disparo")
 * @ORM\Entity
 */
class Disparo
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
     * @ORM\Column(name="plan", type="integer", nullable=false)
     */
    private $plan;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dispersion", type="integer", nullable=true)
     */
    private $dispersion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var bool
     *
     * @ORM\Column(name="configuracion", type="boolean", nullable=false)
     */
    private $configuracion;

    public function getNumero(): ?int
    {
        return $this->numero;
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

    public function getDispersion(): ?int
    {
        return $this->dispersion;
    }

    public function setDispersion(?int $dispersion): self
    {
        $this->dispersion = $dispersion;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getConfiguracion(): ?bool
    {
        return $this->configuracion;
    }

    public function setConfiguracion(bool $configuracion): self
    {
        $this->configuracion = $configuracion;

        return $this;
    }


}
