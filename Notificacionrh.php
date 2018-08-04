<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificacionrh
 *
 * @ORM\Table(name="notificacionrh")
 * @ORM\Entity
 */
class Notificacionrh
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
     * @ORM\Column(name="notificacion", type="integer", nullable=false)
     */
    private $notificacion;

    public function getId(): ?int
    {
        return $this->id;
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
