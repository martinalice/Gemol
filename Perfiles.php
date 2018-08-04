<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfiles
 *
 * @ORM\Table(name="perfiles")
 * @ORM\Entity
 */
class Perfiles
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
     * @var string
     *
     * @ORM\Column(name="perfil", type="string", length=50, nullable=false)
     */
    private $perfil;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=false)
     */
    private $descripcion;

    public function getPalabraClave(): ?string
    {
        return $this->palabraClave;
    }

    public function getPerfil(): ?string
    {
        return $this->perfil;
    }

    public function setPerfil(string $perfil): self
    {
        $this->perfil = $perfil;

        return $this;
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
