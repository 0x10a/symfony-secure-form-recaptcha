<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FormData;
use AppBundle\Recapcha\RecapchaVerification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller
{
    //Recapcha Validation
    private $recapcha;

    function __construct()
    {
        $this->recapcha = new RecapchaVerification();
    }

    /**
     * Contact Form Route
     *
     * @Route("/", name="ContactForm")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        // Creating an instance of our entity class
        $formdata = new FormData();
        //Creating our form
        $form = $this->createForm('AppBundle\Form\ContactForm', $formdata);
        // Verifying Recapcha
        $formdata->setRecapcha($this->recapcha->verify($request->request->get('g-recaptcha-response')));
        // Handling for Request
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
                // Entering values to the database
                $em = $this->getDoctrine()->getManager();
                $em->persist($formdata);
                $em->flush();
                // Rendering Success Page
                return $this->render('/Contact_Form/success.html.twig');
        }

        //Rendering the Form
        return $this->render('Contact_Form/contactform.html.twig', array(
            'datum' => $formdata,
            'form' => $form->createView(),
        ));

    }



}
