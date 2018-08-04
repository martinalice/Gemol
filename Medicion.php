<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicion
 *
 * @ORM\Table(name="medicion")
 * @ORM\Entity
 */
class Medicion
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
     * @var int
     *
     * @ORM\Column(name="estrategia", type="integer", nullable=false)
     */
    private $estrategia;

    /**
     * @var int
     *
     * @ORM\Column(name="puntoviejo", type="integer", nullable=false)
     */
    private $puntoviejo;

    /**
     * @var int
     *
     * @ORM\Column(name="puntonuevo", type="integer", nullable=false)
     */
    private $puntonuevo;

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

    public function getEstrategia(): ?int
    {
        return $this->estrategia;
    }

    public function setEstrategia(int $estrategia): self
    {
        $this->estrategia = $estrategia;

        return $this;
    }

    public function getPuntoviejo(): ?int
    {
        return $this->puntoviejo;
    }

    public function setPuntoviejo(int $puntoviejo): self
    {
        $this->puntoviejo = $puntoviejo;

        return $this;
    }

    public function getPuntonuevo(): ?int
    {
        return $this->puntonuevo;
    }

    public function setPuntonuevo(int $puntonuevo): self
    {
        $this->puntonuevo = $puntonuevo;

        return $this;
    }


}
