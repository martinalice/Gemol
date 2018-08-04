<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Cronograma;
use App\Entity\Medicion;
use App\Entity\Planif;
use App\Entity\Estados;
use App\Entity\Mantenimientotipo;
use App\Entity\Estrategias;
use App\Entity\Activohijo;
use App\Entity\Activopadre;

use Symfony\Component\HttpFoundation\Request;
use App\Form\CronogramaType;

class CronogramaController extends Controller
{


	public function nuevoCronograma(Request $request)
	{

	$em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $query = "SELECT * FROM planif ORDER BY numero DESC LIMIT 1;";
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



        $cronograma = new Cronograma();

        $form = $this->createForm(CronogramaType::class, $cronograma);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

                for($x=1;$x<=10;$x++)
                {
                        $tarea = $form->get('tarea'.$x)->getData();
                        if($tarea!='')
                        {
                        for($i=1;$i<=30;$i++)
                        {
                                $crono[$i] = $form->get($x.$i)->getData();
                                if($crono[$i]==false)
                                {       
                                        $crono[$i] = '0';
                                }
                                else
                                {
                                        $crono[$i] = '1';
                                }
                        }

                        $saltito = implode(',',$crono);
                
                        $cronograma = new Cronograma();
                        $cronograma->setPlan($plannum->getNumero());
                        $cronograma->setTarea($tarea);
                        $cronograma->setMultiplicador($saltito);
                        $cronograma->setMultiplicadorreal($saltito);


                        $em->persist($cronograma);

                        $em->flush();
                        }
                }


        $this->addFlash('notice', 'Tus cambios se han guardado!');

        }

        return $this->render('cronograma.html.twig', array('form' => $form->createView(), 'plannum' => $plannum, 'estado' => $estado, 'estrategia' => $estrategia, 'tipo' => $tipo, 'actp' => $actp, 'acth' => $acth));

        }
}