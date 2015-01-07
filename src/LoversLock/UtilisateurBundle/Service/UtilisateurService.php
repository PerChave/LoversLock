<?php

namespace LoversLock\UtilisateurBundle\Service;

use Doctrine\ORM\EntityManager;
use LoversLock\UtilisateurBundle\Entity\Utilisateur;

use Doctrine\ORM\EntityRepository;

class UtilisateurService extends EntityRepository
{

    public function __construct(EntityManager $em) {
        $this->_em = $em;
    }

    /**
     * @param $idSite
     * @param $nomSite
     * @return Utilisateur
     */
    public function creerUtilisateur($idSite, $nomSite) {
        $util = new Utilisateur();
        $util->setNomSite($nomSite);
        $util->setIdSite($idSite);
        $this->persistUtilisateur($util);
        //TODO : ajouter les types cadenas gratuits
        return $util;
    }

    /**
     * @param Utilisateur $util
     */
    public function persistUtilisateur(Utilisateur $util) {
        $this->getEntityManager()->persist($util);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Utilisateur $util
     */
    public function supprimerUtilisateur(Utilisateur $util) {
        $this->getEntityManager()->remove($util);
        $this->getEntityManager()->flush();
    }
}