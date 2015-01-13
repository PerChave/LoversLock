<?php

namespace LoversLock\CadenasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cadenas
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Cadenas
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
     * @ORM\ManyToMany(targetEntity="LoversLock\UtilisateurBundle\Entity\Utilisateur", mappedBy="cadenas")
     */
    private $utilisateurs;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRencontre", type="date")
     */
    private $dateRencontre;

    /**
     * @ORM\OneToMany(targetEntity="Commentaire", mappedBy="cadenas")
     */
    private $commentaires;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="TypeCadenas", inversedBy="cadenas")
     * @ORM\JoinColumn(name="type_cadenas_id", referencedColumnName="id")
     */
    private $typeCadenas;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dateCreation = new \DateTime('now');
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Cadenas
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Cadenas
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Cadenas
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    
        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Cadenas
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateRencontre
     *
     * @param \DateTime $dateRencontre
     * @return Cadenas
     */
    public function setDateRencontre($dateRencontre)
    {
        $this->dateRencontre = $dateRencontre;
    
        return $this;
    }

    /**
     * Get dateRencontre
     *
     * @return \DateTime 
     */
    public function getDateRencontre()
    {
        return $this->dateRencontre;
    }

    /**
     * Add utilisateurs
     *
     * @param \LoversLock\UtilisateurBundle\Entity\Utilisateur $utilisateurs
     * @return Cadenas
     */
    public function addUtilisateur(\LoversLock\UtilisateurBundle\Entity\Utilisateur $utilisateurs)
    {
        $this->utilisateurs[] = $utilisateurs;
    
        return $this;
    }

    /**
     * Remove utilisateurs
     *
     * @param \LoversLock\UtilisateurBundle\Entity\Utilisateur $utilisateurs
     */
    public function removeUtilisateur(\LoversLock\UtilisateurBundle\Entity\Utilisateur $utilisateurs)
    {
        $this->utilisateurs->removeElement($utilisateurs);
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

    /**
     * Add commentaires
     *
     * @param \LoversLock\CadenasBundle\Entity\Commentaire $commentaires
     * @return Cadenas
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
     * Set typeCadenas
     *
     * @param \LoversLock\CadenasBundle\Entity\TypeCadenas $typeCadenas
     * @return Cadenas
     */
    public function setTypeCadenas(\LoversLock\CadenasBundle\Entity\TypeCadenas $typeCadenas = null)
    {
        $this->typeCadenas = $typeCadenas;
    
        return $this;
    }

    /**
     * Get typeCadenas
     *
     * @return \LoversLock\CadenasBundle\Entity\TypeCadenas 
     */
    public function getTypeCadenas()
    {
        return $this->typeCadenas;
    }
}
