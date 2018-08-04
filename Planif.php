<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planif
 *
 * @ORM\Table(name="planif")
 * @ORM\Entity
 */
class Planif
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
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var int
     *
     * @ORM\Column(name="tipo", type="integer", nullable=false)
     */
    private $tipo;

    /**
     * @var int
     *
     * @ORM\Column(name="estrategia", type="integer", nullable=false)
     */
    private $estrategia;

    /**
     * @var int
     *
     * @ORM\Column(name="salto", type="integer", nullable=false)
     */
    private $salto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="iniciocontador", type="integer", nullable=true)
     */
    private $iniciocontador;

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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): self
    {
        $this->tipo = $tipo;

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

    public function getSalto(): ?int
    {
        return $this->salto;
    }

    public function setSalto(int $salto): self
    {
        $this->salto = $salto;

        return $this;
    }

    public function getIniciocontador(): ?int
    {
        return $this->iniciocontador;
    }

    public function setIniciocontador(?int $iniciocontador): self
    {
        $this->iniciocontador = $iniciocontador;

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


}
