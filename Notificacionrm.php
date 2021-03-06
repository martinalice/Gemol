<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificacionrm
 *
 * @ORM\Table(name="notificacionrm")
 * @ORM\Entity
 */
class Notificacionrm
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
     * @ORM\Column(name="notificacion", type="integer", nullable=false)
     */
    private $notificacion;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNotificacion(): ?int
    {
        return $this->notificacion;
    }

    public function setNotificacion(int $notificacion): self
    {
        $this->notificacion = $notificacion;

        return $this;
    }


}
