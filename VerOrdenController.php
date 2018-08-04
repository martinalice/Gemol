<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Orden;
use App\Entity\Estados;
use App\Entity\Mantenimientipo;
use App\Entity\Activohijo;
use App\Entity\Activopadre;


use Symfony\Component\HttpFoundation\Request;
//use App\Form\VerOrdenType;

class VerOrdenController extends Controller
{

	public function verOrden()
	{

		$em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $query = "SELECT orden.numero as num, estados.descripcion as estatus, mantenimientotipo.descripcion as type, activopadre.nombre as padre, activohijo.nombre as hijo, orden.descripcion as descr, orden.criticidad as crit, orden.programainicio as inicio, orden.programafin as fin, orden.plan as plan, orden.costoordentotal as costo FROM orden INNER JOIN estados ON estados.numero = orden.estado inner join mantenimientotipo ON mantenimientotipo.numero = orden.tipo inner join activopadre on activopadre.numero = orden.activopadre inner join activohijo on activohijo.numero = orden.activohijo;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $po=$stmt->fetchAll();
//        $ordenes = $this->getDoctrine()->getManager()->getRepository('App:Orden')->findBy($po);





        return $this->render('verorden.html.twig', array('po' => $po));
    }
}