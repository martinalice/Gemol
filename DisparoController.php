<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Disparo;
use App\Entity\Transito;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DisparoType;
use App\Form\SearchPlantoDisparoType;
use App\Controller\SearchPlanDisparo;


class DisparoController extends Controller
{


	public function nuevoDisparo(Request $request)
	{

		$em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $queryn = "SELECT * FROM transito ORDER BY id DESC LIMIT 1;";
        $stmtn = $db->prepare($queryn);
        $stmtn->execute();
        $pon=$stmtn->fetchColumn();
        $plannumn = $this->getDoctrine()->getManager()->getRepository('App:Transito')->find($pon);
        $num = $plannumn->getNumero();




        $query = "SELECT * FROM planif WHERE numero =".$num.";";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $po=$stmt->fetchColumn();
        $plannum = $this->getDoctrine()->getManager()->getRepository('App:Planif')->find($po);
        $e = $plannum->getEstado();
        $est = $plannum->getEstrategia();
        $t = $plannum->getTipo();
        $ap = $plannum->getActivopadre();
        $ah = $plannum->getActivohijo();

        $queryestado = "SELECT * FROM estados WHERE numero = ".$e.";";
        $stmtestado = $db->prepare($queryestado);
        $stmtestado->execute();
        $poestado=$stmtestado->fetchColumn();
        $estado = $this->getDoctrine()->getManager()->getRepository('App:Estados')->find($poestado);

        $queryestrategia = "SELECT * FROM estrategias WHERE numero = ".$est.";";
        $stmtestrategia = $db->prepare($queryestrategia);
        $stmtestrategia->execute();
        $poestrategia=$stmtestrategia->fetchColumn();
        $estrategia = $this->getDoctrine()->getManager()->getRepository('App:Estrategias')->find($poestrategia);


        $querytipo = "SELECT * FROM mantenimientotipo WHERE numero = ".$t.";";
        $stmttipo = $db->prepare($querytipo);
        $stmttipo->execute();
        $potipo=$stmttipo->fetchColumn();
        $tipo = $this->getDoctrine()->getManager()->getRepository('App:Mantenimientotipo')->find($potipo);


        $queryap = "SELECT * FROM activopadre WHERE numero = ".$ap.";";
        $stmtap = $db->prepare($queryap);
        $stmtap->execute();
        $poap=$stmtap->fetchColumn();
        $actp = $this->getDoctrine()->getManager()->getRepository('App:Activopadre')->find($poap);


        $queryah = "SELECT * FROM activohijo WHERE numero = ".$ah.";";
        $stmtah = $db->prepare($queryah);
        $stmtah->execute();
        $poah=$stmtah->fetchColumn();
        $acth = $this->getDoctrine()->getManager()->getRepository('App:Activohijo')->find($poah);

		$disparo = new Disparo();
		$disparo->setPlan($plannum->getNumero());

		$form = $this->createForm(DisparoType::class, $disparo);
    	$form->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid())
    	{
    		
    		$plannum->setEstado('1');
    		$em->flush();

            $disparo = $form->getData();
 
        	$em->persist($disparo);

        	$em->flush();

        $this->addFlash('notice', 'Tus cambios se han guardado!');


    	}

        return $this->render('disparo.html.twig', array('form' => $form->createView(), 'plannum' => $plannum, 'estado' => $estado, 'estrategia' => $estrategia, 'tipo' => $tipo, 'actp' => $actp, 'acth' => $acth));

    }
}