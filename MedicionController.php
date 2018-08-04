<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Medicion;
use App\Entity\Notificacion;
use App\Entity\Cronograma;
use App\Entity\Planif;
use App\Entity\Disparo;
use App\Entity\Aviso;
use App\Entity\Orden;
use App\Entity\Transito;
use Symfony\Component\HttpFoundation\Request;
use App\Form\MedicionType;
use App\Controller\SearchPlanMedicion;
use App\Form\SearchPlantoMedicionType;



class MedicionController extends Controller
{
	public function nuevoMedicion(Request $request)
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
        $n = $plannum->getNumero();
        $query1 = "SELECT * FROM cronograma WHERE plan = ".$n.";";
        $query3 = "SELECT * FROM disparo WHERE plan = ".$n.";";
        $query4 = "SELECT * FROM medicion WHERE plan = ".$n.";";
        $stmt1 = $db->prepare($query1);
        $stmt3 = $db->prepare($query3);    
        $stmt4 = $db->prepare($query4);    
        $stmt1->execute();
        $stmt3->execute();
        $stmt4->execute();
        $po1=$stmt1->fetchColumn();
        $po3=$stmt3->fetchColumn();
        $po4=$stmt4->fetchColumn();
        $cronograma = $this->getDoctrine()->getManager()->getRepository('App:Cronograma')->find($po1);


        $e = $plannum->getEstado();
        $est = $plannum->getEstrategia();
        $t = $plannum->getTipo();
        $ap = $plannum->getActivopadre();
        $ah = $plannum->getActivohijo();

        $querypviejo = "SELECT * FROM medicion WHERE plan = ".$n.";";
        $stmtpviejo = $db->prepare($querypviejo);
        $stmtpviejo->execute();
        $popviejo=$stmtpviejo->fetchColumn();
        $pviejo = $this->getDoctrine()->getManager()->getRepository('App:Medicion')->find($popviejo);

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


        $allreg = $this->getDoctrine()->getManager()->getRepository('App:Cronograma')->findBy(array('plan' => $cronograma->getPlan())); 
        $plannum1 = $this->getDoctrine()->getManager()->getRepository('App:Cronograma')->find($po1);
        $plannum3 = $this->getDoctrine()->getManager()->getRepository('App:Disparo')->find($po3);
        $plannum4 = $this->getDoctrine()->getManager()->getRepository('App:Medicion')->find($po4);
        $salto = $plannum->getSalto();
        $contador = $plannum->getIniciocontador();	
        $disparador = $plannum3->getConfiguracion();

        $medicion = new Medicion();
        $form = $this->createForm(MedicionType::class, $medicion);

        $form->handleRequest($request);

        $puntonuevo = $form->get('puntonuevo')->getData();
        $puntoviejo = $form->get('puntoviejo')->getData();


        if($form->isSubmitted() && $form->isValid())
        {


        	foreach($allreg as $all)
        	{
        		$tarea = $all->getTarea();
        		$multreal = $all->getMultiplicadorreal();

				$matriz = explode(',',$multreal);
				for($p=0;$p<=29;$p++)
 				{
  					if($matriz[$p]==1)
  					{
   						$saltear = ($salto*($p+1));
				    	{
   							if($puntonuevo>=$saltear)
   							{
						    	$matriz[$p]=0;
						    	if($disparador==1)
    							{ 
    								$aviso = new Aviso();
     								$aviso->setEstado('5');
     								$aviso->setActivopadre($plannum->getActivopadre());
     								$aviso->setActivohijo($plannum->getActivohijo());
     								$aviso->setDescripcion($tarea);
     								$aviso->setCriticidad('1');
                                    $aviso->setPlan($plannum->getNumero());

     								$em->persist($aviso);
     								$em->flush();
						    	}
    							else
    							{
    								$orden = new Orden();
     								$orden->setEstado('5');
     								$orden->setTipo($plannum->getTipo());
     								$orden->setActivopadre($plannum->getActivopadre());
     								$orden->setActivohijo($plannum->getActivohijo());
     								$orden->setDescripcion($tarea);
     								$orden->setCriticidad('1');
                                    $orden->setPlan($plannum->getNumero());
                                    $orden->setCostoordentotal('0');

	     							$em->persist($orden);
    	 							$em->flush();

                                    $notificacion = new Notificacion();
                                    $notificacion->setEstado('7');
                                    $notificacion->setTipo($plannum->getTipo());
                                    $notificacion->setActivopadre($plannum->getActivopadre());
                                    $notificacion->setActivohijo($plannum->getActivohijo());
                                    $notificacion->setDescripcion($tarea);
                                    $notificacion->setCriticidad('1');
                                    $notificacion->setPlan($plannum->getNumero());

                                    $em->persist($notificacion);
                                    $em->flush();


    							}

    						}
						}
					}
				}
				$var = implode(',',$matriz);

				$all->setMultiplicadorreal($var);
				$em->flush();
			}

			//en PlanController da la instruccion de que inserte un registro en la tabla Medicion con los valores iniciales, para luego aqui en Medicion Controler simplemente actualice los puntos de medicion.

				$plannum4->setPuntoviejo($puntoviejo);
				$plannum4->setPuntonuevo($puntonuevo);
				$em->flush();

        $this->addFlash('notice', 'Tus cambios se han guardado!');

		}        
    
        return $this->render('medicion.html.twig', array('form' => $form->createView(), 'plannum' => $plannum, 'estado' => $estado, 'estrategia' => $estrategia, 'tipo' => $tipo, 'actp' => $actp, 'acth' => $acth, 'pviejo' => $pviejo));

    }

}
