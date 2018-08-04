<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Equipo;
use Symfony\Component\HttpFoundation\Request;

class EquipoController extends Controller
{


	public function nuevoEquipo()
	{
	return $this->render('equipo.html.twig');
        }
}