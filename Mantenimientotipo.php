<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mantenimientotipo
 *
 * @ORM\Table(name="mantenimientotipo")
 * @ORM\Entity
 */
class Mantenimientotipo
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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    public function getNumero(): ?int
    {
        return $this->numero;
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


}
