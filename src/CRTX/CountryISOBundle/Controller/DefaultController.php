<?php

namespace CRTX\CountryISOBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CRTXCountryISOBundle:Default:index.html.twig',
            array('countryArray' => $this->container->getParameter('CountryISO')) 
        );
    }
}
