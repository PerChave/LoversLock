<?php

namespace LoversLock\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Utilisateur implements \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="idSite", type="string", length=255)
     */
    private $idSite;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSite", type="string", length=255)
     */
    private $nomSite;

    /**
     * @ORM\ManyToMany(targetEntity="LoversLock\CadenasBundle\Entity\Cadenas", inversedBy="utilisateurs")
     * @ORM\JoinTable(name="utilisateurs_liste_cadenas",
     *      joinColumns={@ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="cadenas_id", referencedColumnName="id")}
     *      )
     */
    private $cadenas;

    /**
     * @ORM\ManyToMany(targetEntity="LoversLock\CadenasBundle\Entity\TypeCadenas", inversedBy="utilisateurs")
     * @ORM\JoinTable(name="utilisateurs_type_cadenas",
     *      joinColumns={@ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="type_cadenas_id", referencedColumnName="id")}
     *      )
     */
    private $typeCadenas;

    /**
     * @ORM\OneToMany(targetEntity="LoversLock\CadenasBundle\Entity\Commentaire", mappedBy="utilisateur")
     */
    private $commentaires;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="date")
     */
    private $dateInscription;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cadenas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->typeCadenas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idSite
     *
     * @param string $idSite
     * @return Utilisateur
     */
    public function setIdSite($idSite)
    {
        $this->idSite = $idSite;
    
        return $this;
    }

    /**
     * Get idSite
     *
     * @return string 
     */
    public function getIdSite()
    {
        return $this->idSite;
    }

    /**
     * Set nomSite
     *
     * @param string $nomSite
     * @return Utilisateur
     */
    public function setNomSite($nomSite)
    {
        $this->nomSite = $nomSite;
    
        return $this;
    }

    /**
     * Get nomSite
     *
     * @return string 
     */
    public function getNomSite()
    {
        return $this->nomSite;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     * @return Utilisateur
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    
        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime 
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Add cadenas
     *
     * @param \LoversLock\CadenasBundle\Entity\Cadenas $cadenas
     * @return Utilisateur
     */
    public function addCadena(\LoversLock\CadenasBundle\Entity\Cadenas $cadenas)
    {
        $this->cadenas[] = $cadenas;
    
        return $this;
    }

    /**
     * Remove cadenas
     *
     * @param \LoversLock\CadenasBundle\Entity\Cadenas $cadenas
     */
    public function removeCadena(\LoversLock\CadenasBundle\Entity\Cadenas $cadenas)
    {
        $this->cadenas->removeElement($cadenas);
    }

    /**
     * Get cadenas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCadenas()
    {
        return $this->cadenas;
    }

    /**
     * Add typeCadenas
     *
     * @param \LoversLock\CadenasBundle\Entity\TypeCadenas $typeCadenas
     * @return Utilisateur
     */
    public function addTypeCadena(\LoversLock\CadenasBundle\Entity\TypeCadenas $typeCadenas)
    {
        $this->typeCadenas[] = $typeCadenas;
    
        return $this;
    }

    /**
     * Remove typeCadenas
     *
     * @param \LoversLock\CadenasBundle\Entity\TypeCadenas $typeCadenas
     */
    public function removeTypeCadena(\LoversLock\CadenasBundle\Entity\TypeCadenas $typeCadenas)
    {
        $this->typeCadenas->removeElement($typeCadenas);
    }

    /**
     * Get typeCadenas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypeCadenas()
    {
        return $this->typeCadenas;
    }

    /**
     * Add commentaires
     *
     * @param \LoversLock\CadenasBundle\Entity\Commentaire $commentaires
     * @return Utilisateur
     */
    public function addCommentaire(\LoversLock\CadenasBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires[] = $commentaires;
    
        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \LoversLock\CadenasBundle\Entity\Commentaire $commentaires
     */
    public function removeCommentaire(\LoversLock\CadenasBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires->removeElement($commentaires);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }


    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            ) = unserialize($serialized);
    }
}
