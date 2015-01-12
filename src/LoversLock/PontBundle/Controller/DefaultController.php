<?php

namespace LoversLock\PontBundle\Controller;

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

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $utilisateur = $this->get("utilisateur.service")->creerUtilisateur("123", "facebook");
        echo $utilisateur->getNomSite();

        $cadenas = $this->get("cadenas.service");

        FacebookSession::setDefaultApplication('414349855386025', '5162b4158b51a93f160c9ab408b8bb4d');

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
                echo $user_profile->getGender();*/

            } catch (FacebookRequestException $e) {

                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();
            }
        }
        if(isset($user_profile)) {
            print_r($user_profile);
            return array('fbUser' => $user_profile);
        }
        else return array();
    }
}
