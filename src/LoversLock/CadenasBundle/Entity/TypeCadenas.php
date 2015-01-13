<?php

namespace LoversLock\CadenasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeCadenas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TypeCadenas
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="accessibilite", type="string", length=255)
     */
    private $accessibilite;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @ORM\OneToMany(targetEntity="Cadenas", mappedBy="typeCadenas")
     */
    private $cadenas;

    /**
     * @ORM\ManyToMany(targetEntity="LoversLock\UtilisateurBundle\Entity\Utilisateur", mappedBy="typeCadenas")
     */
    private $utilisateurs;

    /**
     * @var string
     *
     * @ORM\Column(name="URLImage", type="string", length=255)
     */
    private $uRLImage;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cadenas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return TypeCadenas
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set accessibilite
     *
     * @param string $accessibilite
     * @return TypeCadenas
     */
    public function setAccessibilite($accessibilite)
    {
        $this->accessibilite = $accessibilite;
    
        return $this;
    }

    /**
     * Get accessibilite
     *
     * @return string 
     */
    public function getAccessibilite()
    {
        return $this->accessibilite;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return TypeCadenas
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set uRLImage
     *
     * @param string $uRLImage
     * @return TypeCadenas
     */
    public function setURLImage($uRLImage)
    {
        $this->uRLImage = $uRLImage;
    
        return $this;
    }

    /**
     * Get uRLImage
     *
     * @return string 
     */
    public function getURLImage()
    {
        return $this->uRLImage;
    }

    /**
     * Add cadenas
     *
     * @param \LoversLock\CadenasBundle\Entity\Cadenas $cadenas
     * @return TypeCadenas
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
     * Add utilisateur
     *
     * @param \LoversLock\UtilisateurBundle\Entity\Utilisateur $utilisateur
     * @return TypeCadenas
     */
    public function addUtilisateur(\LoversLock\UtilisateurBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;
    
        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \LoversLock\UtilisateurBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\LoversLock\UtilisateurBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}
