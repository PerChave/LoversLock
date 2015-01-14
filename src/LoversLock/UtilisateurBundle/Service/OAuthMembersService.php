<?php

namespace LoversLock\UtilisateurBundle\Service;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUserProvider as BaseOAuthUserProvider;

use \HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

class OAuthMembersService extends BaseOAuthUserProvider{
    protected $session;
    public function __construct($session) {
        $this->session = $session;

    }


    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {

        //data from facebook response
        $facebook_id = $response->getUsername();
        $nickname = $response->getNickname();
        $realname = $response->getRealName();
        $email = $response->getEmail();
        $avatar = $response->getProfilePicture();

        //set data in session
        $this->session->set('nickname', $nickname);
        $this->session->set('realname', $realname);
        $this->session->set('email', $email);
        $this->session->set('avatar', $avatar);

        //get user by fid
        /*$qb = $this->doctrine->getManager()->createQueryBuilder();
        $qb ->select('u.id')
            ->from('AcmeDemoBundle:User', 'u')
            ->where('u.fid = :fid')
            ->setParameter('fid', $facebook_id)
            ->setMaxResults(1);
        $result = $qb->getQuery()->getResult();

        //add to database if doesn't exists
        if ( !count($result) ) {
            $User = new User();
            $User->setCreatedAt(new \DateTime());
            $User->setNickname($nickname);
            $User->setRealname($realname);
            $User->setEmail($email);
            $User->setAvatar($avatar);
            $User->setFID($facebook_id);

            $em = $this->doctrine->getManager();
            $em->persist($User);
            $id = $em->flush();
        } else {
            $id = $result[0]['id'];
        }

        //set id
        $this->session->set('id', $id);

        //@TODO: hmm : is admin
        if ($this->isUserAdmin($nickname)) {
            $this->session->set('is_admin', true);
        }

        //parent:: returned value
        return $this->loadUserByUsername($response->getNickname());
    }

    public function supportsClass($class)
    {
        return $class === 'Acme\\DemoBundle\\Provider\\OAuthUser';
    }*/
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

}