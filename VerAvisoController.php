<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Aviso;
use App\Entity\Estados;
use App\Entity\Activohijo;
use App\Entity\Activopadre;


use Symfony\Component\HttpFoundation\Request;
//use App\Form\VerOrdenType;

class VerAvisoController extends Controller
{

	public function verAviso()
	{

		$em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $query = "SELECT aviso.numero as num, estados.descripcion as estatus, activopadre.nombre as padre, activohijo.nombre as hijo, aviso.descripcion as descr, aviso.criticidad as crit, aviso.plan as plan FROM aviso INNER JOIN estados ON estados.numero = aviso.estado inner join activopadre on activopadre.numero = aviso.activopadre inner join activohijo on activohijo.numero = aviso.activohijo;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $po=$stmt->fetchAll();

//        $ordenes = $this->getDoctrine()->getManager()->getRepository('App:Orden')->findBy($po);





        return $this->render('veraviso.html.twig', array('po' => $po));
    }
}