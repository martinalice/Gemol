<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordenrh
 *
 * @ORM\Table(name="ordenrh")
 * @ORM\Entity
 */
class Ordenrh
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
     * @ORM\Column(name="tarea", type="string", length=200, nullable=false)
     */
    private $tarea;

    /**
     * @var int
     *
     * @ORM\Column(name="operario", type="integer", nullable=false)
     */
    private $operario;

    /**
     * @var int
     *
     * @ORM\Column(name="horas", type="integer", nullable=false)
     */
    private $horas;

    /**
     * @var int
     *
     * @ORM\Column(name="costoordenrh", type="integer", nullable=false)
     */
    private $costoordenrh;

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

    public function getTarea(): ?string
    {
        return $this->tarea;
    }

    public function setTarea(string $tarea): self
    {
        $this->tarea = $tarea;

        return $this;
    }

    public function getOperario(): ?int
    {
        return $this->operario;
    }

    public function setOperario(int $operario): self
    {
        $this->operario = $operario;

        return $this;
    }

    public function getHoras(): ?int
    {
        return $this->horas;
    }

    public function setHoras(int $horas): self
    {
        $this->horas = $horas;

        return $this;
    }

    public function getCostoordenrh(): ?int
    {
        return $this->costoordenrh;
    }

    public function setCostoordenrh(int $costoordenrh): self
    {
        $this->costoordenrh = $costoordenrh;

        return $this;
    }


}
