<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Driver\Connection;
use App\Entity\Orden;
use App\Entity\Ordenrh;
use App\Entity\Ordenrm;
use App\Entity\Estados;
use App\Entity\Equipo;
use App\Entity\Notificacion;
use App\Entity\Notificacionrh;
use App\Entity\Mantenimientotipo;
use App\Entity\Activohijo;
use App\Entity\Activopadre;
use Symfony\Component\HttpFoundation\Request;
use App\Form\OrdenrhType;


class OrdenrhController extends Controller
{


	public function nuevoOrdenrh(Request $request, Connection $connection)
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


        $ordenrh = new Ordenrh();

        $form = $this->createForm(OrdenrhType::class, $ordenrh);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

                for($x=1;$x<=10;$x++)
                {
                   $tarea = $form->get('tarea'.$x)->getData();
                   $operario = $form->get('operario'.$x)->getData();
                   $horas = $form->get('horas'.$x)->getData();
                   if($tarea!='')
                   {




                        $ordenrh = new Ordenrh();
                        $ordenrh->setOrden($ordennum->getNumero());
                        $ordenrh->setTarea($tarea);
                        $ordenrh->setOperario($operario);
                    
//busca el valor hora del operario seleccionado

                        $queryeq = "SELECT * FROM equipo WHERE numero = ".$operario.";";
                        $stmteq = $db->prepare($queryeq);
                        $stmteq->execute();
                        $poeq=$stmteq->fetchColumn();
                        $costohhoperario = $this->getDoctrine()->getManager()->getRepository('App:Equipo')->find($poeq);
//----------------------------------------------


                        $ordenrh->setHoras($horas);
                        $costohh = ($costohhoperario->getCostohh() * $horas);
                        $ordenrh->setCostoordenrh($costohh);

                        $em->persist($ordenrh);

                        $em->flush();


                        $notificacionrh = new Notificacionrh();
                        $notificacionrh->setNotificacion($ordennum->getNumero());
                        $notificacionrh->setTarea($tarea);
                        $notificacionrh->setOperario($operario);
                        $notificacionrh->setHoras($horas);


                        $em->persist($notificacionrh);

                        $em->flush();

                        $n = $ordennum->getNumero();
                        $totalrm = $connection->fetchColumn("SELECT SUM(costoordenrm) FROM ordenrm WHERE orden = ".$n."");
                        $totalrh = $connection->fetchColumn("SELECT SUM(costoordenrh) FROM ordenrh WHERE orden = ".$n."");

                        $totalorden = ($totalrh + $totalrm);
                        $ordennum->setCostoordentotal($totalorden);
                        $em->flush();


                    }
                }

        $this->addFlash('notice', 'Tus cambios se han guardado!');


        }

        return $this->render('ordenrh.html.twig', array('form' => $form->createView(), 'ordennum' => $ordennum, 'estado' => $estado, 'tipo' => $tipo, 'actp' => $actp, 'acth' => $acth));
    }
        
}
