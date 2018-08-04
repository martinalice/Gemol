<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Usuarios;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{


	public function login(Request $request)
	{
		
		return $this->render('login.html.twig');
    }
}