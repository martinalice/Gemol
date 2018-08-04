<?php

namespace App\Controller;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Orden;
use App\Entity\Activopadre;
use App\Entity\Activohijo;
use App\Entity\Sociedades;
use App\Entity\Aviso;
use App\Entity\Notificacion;
use Symfony\Component\HttpFoundation\Request;
use App\Form\OrdenType;


class OrdenController extends Controller
{


	public function nuevoOrden(Request $request, ValidatorInterface $validator)
	{

        	$em = $this->getDoctrine()->getManager();
                $db = $em->getConnection();
                $query = "SELECT * FROM orden ORDER BY numero DESC LIMIT 1;";
                $stmt = $db->prepare($query);
                $stmt->execute();
                $po=$stmt->fetchColumn();
                $ordennum = $this->getDoctrine()->getManager()->getRepository('App:Orden')->find($po);

                $padres = $this->getDoctrine()->getManager()->getRepository('App:Activopadre')->findAll();
                $hijos = $this->getDoctrine()->getManager()->getRepository('App:Activohijo')->findAll();

 
                $aviso = $this->getDoctrine()->getManager()->getRepository('App:Aviso')->findAll();


                $orden = new Orden();



                $form = $this->createForm(OrdenType::class, $orden);
                $form->handleRequest($request);

                $error = $validator->validate($orden);

                if($form->isSubmitted() && $form->isValid() && count($error) == 0)
                {

                        $padre = $request->request->get('activopadre');
                        $hijo = $request->request->get('activohijo');
                        $orden->setActivopadre($padre);
                        $orden->setActivohijo($hijo);
                        $orden = $form->getData();
                        $em->persist($orden);
                        $em->flush();

                        $a = $request->request->get('aviso');
                        $sociedad = new Sociedades();
                        $sociedad->setAviso($a);
                        $sociedad->setOrden($request->request->get('ordennumero'));
                        $em->persist($sociedad);
                        $em->flush();

                        $notificacion = new Notificacion();
                        $notificacion->setEstado('7');
                        $notificacion->setTipo($form->get('tipo')->getData());
                        $notificacion->setActivopadre($padre);
                        $notificacion->setActivohijo($hijo);
                        $notificacion->setDescripcion($form->get('descripcion')->getData());
                        $notificacion->setCriticidad($form->get('criticidad')->getData());
                        $notificacion->setPlan('0');

                        $em->persist($notificacion);
                        $em->flush();



                        return $this->redirectToRoute('ordenrm');
                }
        if (count($error) > 0) {

                $this->addFlash('notice', 'Debe ingresar fecha valida, (Ej: Inicio igual o posterior a la fecha actual; Finalización igual o posterior a la fecha de inicio');
    }

		
                return $this->render('orden.html.twig', array('form' => $form->createView(), 'ordennum' => $ordennum, 'aviso' => $aviso, 'padres' => $padres, 'hijos' => $hijos));

        }
}
