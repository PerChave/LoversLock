<?php

namespace LoversLock\UtilisateurBundle\Security;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser as BaseOAuthUser;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

class OAuthUser extends BaseOAuthUser{

    protected $data;

    public function __construct(UserResponseInterface $response) {
        parent::__construct($response->getUsername());
        $this->data = array(
            'nomSite'=>'fb',
            'idSite'=>$response->getAccessToken()
        );
        $vars = array(
            'id',
            'firstname',
            'lastname',
            'email',
            'profilePicture',
            'accessToken',
            'tokenSecret',
            'expiresIn',
        );
        foreach($vars as $v) {
            $fct = 'get'.ucfirst($v);
            $this->data[$v] = $response->$fct();
        }
    }

    public function getData() {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles() {
        return array('ROLE_OAUTH_USER');
    }

}