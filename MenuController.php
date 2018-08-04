<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Permisos;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{


	public function menu()
	{
	return $this->render('menu.html.twig');
        }
}