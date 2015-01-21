<?php

namespace LoversLock\UtilisateurBundle\Service;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUserProvider as BaseOAuthUserProvider;

use Doctrine\ORM\EntityManager;
use \HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use LoversLock\CadenasBundle\Entity\TypeCadenas;
use LoversLock\UtilisateurBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Session\Session;

class OAuthMembersService extends BaseOAuthUserProvider{
    private $em;
    private $session;

    public function __construct($session, EntityManager $em) {
        $this->session = $session;
        $this->em = $em;

    }

    public function loadUserBySiteId($id){

        $util = $this->em->getRepository('LoversLockUtilisateurBundle:Utilisateur')->findOneBy(array('idSite' => $id));
        return $util;
    }

    public function getDefaultTypeCadenas(){
        $tc = $this->em->getRepository('LoversLockCadenasBundle:TypeCadenas')->findOneBy(array('id' => 1));
        return $tc;
    }


    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $site_id=$response->getUsername();
        $site_nom=$response->getResourceOwner()->getName();
        $result=$this->loadUserBySiteId($response->getUsername());
        //on verifie si l'utilisateur n'existe deja dans la bd, sinon on le cree
        if(!count($result)){

            $default_type_cadenas = $this->getDefaultTypeCadenas();

            $utilisateur = new Utilisateur();
            $utilisateur->setIdSite($site_id);
            $utilisateur->setNomSite($site_nom);
            $utilisateur->setDateInscription(new \DateTime('NOW'));
            $utilisateur->addTypeCadena($default_type_cadenas);
            $this->em->persist($utilisateur);
            $this->em->flush();
        }
        $user = $this->loadUserByUsername(sprintf('%s-%s',$response->getResourceOwner()->getName(),
                                                        $response->getUsername()));


        return $user;

    }

}