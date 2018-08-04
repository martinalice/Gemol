<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sociedades
 *
 * @ORM\Table(name="sociedades")
 * @ORM\Entity
 */
class Sociedades
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
     * @ORM\Column(name="aviso", type="integer", nullable=false)
     */
    private $aviso;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=false)
     */
    private $orden;

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function getAviso(): ?int
    {
        return $this->aviso;
    }

    public function setAviso(int $aviso): self
    {
        $this->aviso = $aviso;

        return $this;
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


}
