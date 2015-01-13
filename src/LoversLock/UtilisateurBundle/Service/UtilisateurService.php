<?php

namespace LoversLock\UtilisateurBundle\Service;

use Doctrine\ORM\EntityManager;
use LoversLock\UtilisateurBundle\Entity\Utilisateur;

use Doctrine\ORM\EntityRepository;

/**
 * Class UtilisateurService
 * @package LoversLock\UtilisateurBundle\Service
 */
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

    public function getById($id) {
        $repository = $this->getEntityManager()->getRepository('LoversLockUtilisateurBundle:Utilisateur');
        $util = $repository->findOneBy(array('id' => $id));
        $this->getEntityManager()->flush();
        return $util;
    }
}
