<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
//use App\Entity\Equipodetrabajo;
use Symfony\Component\HttpFoundation\Request;


class EquipodetrabajoController extends Controller
{


	public function nuevoEquipodetrabajo()
	{
	return $this->render('equipodetrabajo.html.twig');
        }
}