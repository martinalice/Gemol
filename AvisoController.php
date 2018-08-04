<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;
use App\Entity\Aviso;
use App\Entity\Activopadre;
use App\Entity\Activohijo;
use App\Form\AvisoType;
use Symfony\Component\HttpFoundation\Request;

class AvisoController extends Controller
{


	public function nuevoAviso(Request $request)
	{
        $em = $this->getDoctrine()->getManager();

        $hijosp1 = $this->getDoctrine()->getManager()->getRepository('App:Activohijo')->findBy(array('activopadre' => '1'));
        $hijosp2 = $this->getDoctrine()->getManager()->getRepository('App:Activohijo')->findBy(array('activopadre' => '2'));
        $hijosp3 = $this->getDoctrine()->getManager()->getRepository('App:Activohijo')->findBy(array('activopadre' => '3'));

        $padres = $this->getDoctrine()->getManager()->getRepository('App:Activopadre')->findAll();

        $hijos = $this->getDoctrine()->getManager()->getRepository('App:Activohijo')->findAll();



        $aviso = new Aviso();
        $form = $this->createForm(AvisoType::class, $aviso);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            $padre = $request->request->get('activopadre');
            $hijo = $request->request->get('activohijo');
            $aviso->setActivopadre($padre);
            $aviso->setActivohijo($hijo);

            $aviso = $form->getData();
            $em->persist($aviso);
            $em->flush();

        $this->addFlash('notice', 'Tus cambios se han guardado!');
        

			}
                return $this->render('aviso.html.twig', array('form' => $form->createView(), 'padres' => $padres, 'hijos' => $hijos, 'hijosp1' => $hijosp1, 'hijosp2' => $hijosp2, 'hijosp3' => $hijosp3));
       }
}