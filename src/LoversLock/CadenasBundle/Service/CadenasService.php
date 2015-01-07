<?php

namespace LoversLock\CadenasBundle\Service;

use Doctrine\ORM\EntityManager;

use Doctrine\ORM\EntityRepository;

class CadenasService extends EntityRepository
{

    public function __construct(EntityManager $em) {
        $this->_em = $em;
    }

}