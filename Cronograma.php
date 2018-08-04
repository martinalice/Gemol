<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cronograma
 *
 * @ORM\Table(name="cronograma")
 * @ORM\Entity
 */
class Cronograma
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
     * @ORM\Column(name="plan", type="integer", nullable=false)
     */
    private $plan;

    /**
     * @var string
     *
     * @ORM\Column(name="tarea", type="string", length=100, nullable=false)
     */
    private $tarea;

    /**
     * @var string
     *
     * @ORM\Column(name="multiplicador", type="string", length=59, nullable=false)
     */
    private $multiplicador;

    /**
     * @var string
     *
     * @ORM\Column(name="multiplicadorreal", type="string", length=59, nullable=false)
     */
    private $multiplicadorreal;

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function getPlan(): ?int
    {
        return $this->plan;
    }

    public function setPlan(int $plan): self
    {
        $this->plan = $plan;

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

    public function getMultiplicador(): ?string
    {
        return $this->multiplicador;
    }

    public function setMultiplicador(string $multiplicador): self
    {
        $this->multiplicador = $multiplicador;

        return $this;
    }

    public function getMultiplicadorreal(): ?string
    {
        return $this->multiplicadorreal;
    }

    public function setMultiplicadorreal(string $multiplicadorreal): self
    {
        $this->multiplicadorreal = $multiplicadorreal;

        return $this;
    }


}
