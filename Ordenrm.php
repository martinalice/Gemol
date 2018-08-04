<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordenrm
 *
 * @ORM\Table(name="ordenrm")
 * @ORM\Entity
 */
class Ordenrm
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=false)
     */
    private $orden;

    /**
     * @var string
     *
     * @ORM\Column(name="material", type="string", length=200, nullable=false)
     */
    private $material;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var int
     *
     * @ORM\Column(name="costo", type="integer", nullable=false)
     */
    private $costo;

    /**
     * @var int
     *
     * @ORM\Column(name="costoordenrm", type="integer", nullable=false)
     */
    private $costoordenrm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

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

    public function getCostoordenrm(): ?int
    {
        return $this->costoordenrm;
    }

    public function setCostoordenrm(int $costoordenrm): self
    {
        $this->costoordenrm = $costoordenrm;

        return $this;
    }


}
