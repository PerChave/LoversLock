<?php

namespace LoversLock\PontBundle\Controller;

use LoversLock\CadenasBundle\Entity\TypeCadenas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use LoversLock\UtilisateurBundle\Service\UtilisateurService;

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\FacebookJavaScriptLoginHelper;

use LoversLock\UtilisateurBundle\Entity\Utilisateur;
use LoversLock\CadenasBundle\Entity\Cadenas;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
       /*FacebookSession::setDefaultApplication('414349855386025', '5162b4158b51a93f160c9ab408b8bb4d');

        $helper = new FacebookJavaScriptLoginHelper();
        try {
            $session = $helper->getSession();
        } catch(FacebookRequestException $ex) {
            // When Facebook returns an error
        } catch(\Exception $ex) {
            // When validation fails or other local issues
        }

        if (isset($session)) {
            try {
                $user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(
                    GraphUser::className()
                );
                /*echo "Name: " . $user_profile->getName();
                echo $user_profile->getFirstname();
                echo $user_profile->getLastname();
                echo $user_profile->getEmail();
                echo $user_profile->getId();
                echo $user_profile->getGender();

            } catch (FacebookRequestException $e) {

                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();
            }
        }
        if(isset($user_profile)) {
            print_r($user_profile);
            return array('fbUser' => $user_profile);
        }
        else return array();*/

        /*$typeCadenas = new TypeCadenas();
        $typeCadenas->setAccessibilite("public");
        $typeCadenas->setNom("cadenas 1");
        $typeCadenas->setPrix(0);
        $typeCadenas->setURLImage("fj");

        $utilisateur = new Utilisateur();
        $utilisateur->setIdSite("123");
        $utilisateur->setNomSite("facebook");
        $utilisateur->addTypeCadena($typeCadenas);

        $utilisateur2 = new Utilisateur();
        $utilisateur2->setIdSite("456");
        $utilisateur2->setNomSite("facebook");
        $utilisateur2->addTypeCadena($typeCadenas);

        $cadenas = new Cadenas();
        $cadenas->setTypeCadenas($typeCadenas);
        $cadenas->addUtilisateur($utilisateur);
        $cadenas->addUtilisateur($utilisateur2);
        $cadenas->setDateRencontre(new \DateTime('NOW'));
        $cadenas->setEtat("public");
        $cadenas->setStatut("blabla");
        $cadenas->setLibelle("libelle");
        $cadenas->setStatut("en couple");

        $utilisateur->addCadena($cadenas);
        $utilisateur2->addCadena($cadenas);

        $em = $this->getDoctrine()->getManager();
        $em->persist($typeCadenas);
        $em->persist($utilisateur);
        $em->persist($utilisateur2);
        $em->persist($cadenas);
        $em->flush();*/

        $product = $this->getDoctrine()
            ->getRepository('LoversLockUtilisateurBundle:Utilisateur')
            ->find(5);

        $c = $product->getCadenas();
        echo $c->get(0)->getLibelle();
        //$utilisateur = $this->get("utilisateur.service")->getById(5);
        //echo $utilisateur->getNomSite();

        return array();
    }
}
