<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Orden;
use App\Entity\Ordenrm;
use App\Entity\Estados;
use App\Entity\Notificacion;
use App\Entity\Notificacionrm;
use App\Entity\Mantenimientotipo;
use App\Entity\Activohijo;
use App\Entity\Activopadre;
use Symfony\Component\HttpFoundation\Request;
use App\Form\OrdenrmType;


class OrdenrmController extends Controller
{


	public function nuevoOrdenrm(Request $request)
	{

	$em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $query = "SELECT * FROM orden ORDER BY numero DESC LIMIT 1;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $po=$stmt->fetchColumn();
        $ordennum = $this->getDoctrine()->getManager()->getRepository('App:Orden')->find($po);

        $e = $ordennum->getEstado();
        $t = $ordennum->getTipo();
        $ap = $ordennum->getActivopadre();
        $ah = $ordennum->getActivohijo();

        $queryestado = "SELECT * FROM estados WHERE numero = ".$e.";";
        $stmtestado = $db->prepare($queryestado);
        $stmtestado->execute();
        $poestado=$stmtestado->fetchColumn();
        $estado = $this->getDoctrine()->getManager()->getRepository('App:Estados')->find($poestado);

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


        $ordenrm = new Ordenrm();

        $form = $this->createForm(OrdenrmType::class, $ordenrm);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

                for($x=1;$x<=10;$x++)
                {
                   $material = $form->get('material'.$x)->getData();
                   $cantidad = $form->get('cantidad'.$x)->getData();
                   $costo = $form->get('costo'.$x)->getData();
                   if($material!='')
                   {

                        $ordenrm = new Ordenrm();
                        $ordenrm->setOrden($ordennum->getNumero());
                        $ordenrm->setMaterial($material);
                        $ordenrm->setCantidad($cantidad);
                        $ordenrm->setCosto($costo);
                        $ordenrm->setCostoordenrm($cantidad * $costo);


                        $em->persist($ordenrm);

                        $em->flush();



                        $notificacionrm = new Notificacionrm();
                        $notificacionrm->setNotificacion($ordennum->getNumero());
                        $notificacionrm->setMaterial($material);
                        $notificacionrm->setCantidad($cantidad);
                        $notificacionrm->setCosto($costo);
                        
                        $em->persist($notificacionrm);
                        $em->flush();

                    }
                }

    
                return $this->redirectToRoute('ordenrh');
        }


        return $this->render('ordenrm.html.twig', array('form' => $form->createView(), 'ordennum' => $ordennum, 'estado' => $estado, 'tipo' => $tipo, 'actp' => $actp, 'acth' => $acth));
    }
        
}
