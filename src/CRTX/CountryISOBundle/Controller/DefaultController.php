<?php

namespace CRTX\CountryISOBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CRTXCountryISOBundle:Default:index.html.twig', array('name' => $name));
    }
}
