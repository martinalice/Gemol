<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Planif;
use App\Entity\Transito;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchPlantoDisparoType;

class SearchPlanDisparo extends Controller
{

	public function buscarpland(Request $request)
	{


 		       	$em = $this->getDoctrine()->getManager();
                $db = $em->getConnection();
                $query = "SELECT * FROM planif WHERE estado = '2';";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $po = $stmt->fetchColumn();
                $plannum = $this->getDoctrine()->getManager()->getRepository('App:Planif')->find($po);

                $datosplan = $this->getDoctrine()->getManager()->getRepository('App:Planif')->findBy(array('estado' => $plannum->getEstado()));
                
	            $transito = new Transito();

	            $form = $this->createForm(SearchPlantoDisparoType::class, $transito);
    	        $form->handleRequest($request);

                


                if($form->isSubmitted() && $form->isValid())
                {

                    $varia = $request->request->get('numero');
                    $transito->setNumero($varia);


		        	$em->persist($transito);

		        	$em->flush();
                     
                    return $this->redirectToRoute('disparo');
                }

                return $this->render('searchpland.html.twig', array('form' => $form->createView(), 'datosplan' => $datosplan));
        }
}