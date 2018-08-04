<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Planif;
use App\Entity\Activopadre;
use App\Entity\Activohijo;
use App\Entity\Medicion;
use Symfony\Component\HttpFoundation\Request;
use App\Form\PlanifType;

class PlanifController extends Controller
{

	public function nuevoPlan(Request $request)
	{

        	$em = $this->getDoctrine()->getManager();
                $db = $em->getConnection();
                $query = "SELECT * FROM planif ORDER BY numero DESC LIMIT 1;";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $po=$stmt->fetchColumn();
                $plannum = $this->getDoctrine()->getManager()->getRepository('App:Planif')->find($po);

                $padres = $this->getDoctrine()->getManager()->getRepository('App:Activopadre')->findAll();
                $hijos = $this->getDoctrine()->getManager()->getRepository('App:Activohijo')->findAll();

                $plan = new Planif();

                $form = $this->createForm(PlanifType::class, $plan);
                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid())
                {

                    $padre = $request->request->get('activopadre');
                    $hijo = $request->request->get('activohijo');
                        $plan->setActivopadre($padre);
                        $plan->setActivohijo($hijo);
                        $plan = $form->getData();
                        $em->persist($plan);
                        $em->flush();

                        $medicion = new Medicion();
                        $medicion->setPlan($plannum->getNumero() + 1);
                        $medicion->setActivopadre($padre);
                        $medicion->setActivohijo($hijo);
                        $medicion->setEstrategia($form->get('estrategia')->getData());
                        $medicion->setPuntoviejo('0');
                        $medicion->setPuntonuevo('0');
                        $em->persist($medicion);
                        $em->flush();

                        return $this->redirectToRoute('cronograma');
                }

                return $this->render('plan.html.twig', array('form' => $form->createView(), 'plannum' => $plannum, 'padres' => $padres, 'hijos' => $hijos));
        }
}