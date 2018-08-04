<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo")
 * @ORM\Entity
 */
class Equipo
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
     * @ORM\Column(name="nombreyapellido", type="string", length=200, nullable=false)
     */
    private $nombreyapellido;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=200, nullable=false)
     */
    private $categoria;

    /**
     * @var int
     *
     * @ORM\Column(name="costohh", type="integer", nullable=false)
     */
    private $costohh;

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function getNombreyapellido(): ?string
    {
        return $this->nombreyapellido;
    }

    public function setNombreyapellido(string $nombreyapellido): self
    {
        $this->nombreyapellido = $nombreyapellido;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getCostohh(): ?int
    {
        return $this->costohh;
    }

    public function setCostohh(int $costohh): self
    {
        $this->costohh = $costohh;

        return $this;
    }


}
