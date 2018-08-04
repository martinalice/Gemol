<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permisos
 *
 * @ORM\Table(name="permisos")
 * @ORM\Entity
 */
class Permisos
{
    /**
     * @var string
     *
     * @ORM\Column(name="palabra_clave", type="string", length=1, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $palabraClave;

    /**
     * @var bool
     *
     * @ORM\Column(name="instalaractivos", type="boolean", nullable=false)
     */
    private $instalaractivos;

    /**
     * @var bool
     *
     * @ORM\Column(name="avisocrear", type="boolean", nullable=false)
     */
    private $avisocrear;

    /**
     * @var bool
     *
     * @ORM\Column(name="plancrear", type="boolean", nullable=false)
     */
    private $plancrear;

    /**
     * @var bool
     *
     * @ORM\Column(name="ordencrear", type="boolean", nullable=false)
     */
    private $ordencrear;

    /**
     * @var bool
     *
     * @ORM\Column(name="ordennotificar", type="boolean", nullable=false)
     */
    private $ordennotificar;

    /**
     * @var bool
     *
     * @ORM\Column(name="medicion", type="boolean", nullable=false)
     */
    private $medicion;

    public function getPalabraClave(): ?string
    {
        return $this->palabraClave;
    }

    public function getInstalaractivos(): ?bool
    {
        return $this->instalaractivos;
    }

    public function setInstalaractivos(bool $instalaractivos): self
    {
        $this->instalaractivos = $instalaractivos;

        return $this;
    }

    public function getAvisocrear(): ?bool
    {
        return $this->avisocrear;
    }

    public function setAvisocrear(bool $avisocrear): self
    {
        $this->avisocrear = $avisocrear;

        return $this;
    }

    public function getPlancrear(): ?bool
    {
        return $this->plancrear;
    }

    public function setPlancrear(bool $plancrear): self
    {
        $this->plancrear = $plancrear;

        return $this;
    }

    public function getOrdencrear(): ?bool
    {
        return $this->ordencrear;
    }

    public function setOrdencrear(bool $ordencrear): self
    {
        $this->ordencrear = $ordencrear;

        return $this;
    }

    public function getOrdennotificar(): ?bool
    {
        return $this->ordennotificar;
    }

    public function setOrdennotificar(bool $ordennotificar): self
    {
        $this->ordennotificar = $ordennotificar;

        return $this;
    }

    public function getMedicion(): ?bool
    {
        return $this->medicion;
    }

    public function setMedicion(bool $medicion): self
    {
        $this->medicion = $medicion;

        return $this;
    }


}
