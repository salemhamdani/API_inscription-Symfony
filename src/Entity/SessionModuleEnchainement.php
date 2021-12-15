<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // Pour la gestion des validations.

/**
 * SessionModuleEnchainement
 *
 * @ORM\Table(name="session_module_enchainement")
 * @ORM\Entity(repositoryClass="App\Repository\SessionModuleEnchainementRepository")
 * @ORM\HasLifecycleCallbacks() 
 */
class SessionModuleEnchainement
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\EnchainementModule", inversedBy="sessionmoduleenchainements", cascade={"persist"})
	*/
	private $enchainementmodule;

	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\SessionModule", inversedBy="sessionmoduleenchainements", cascade={"persist"})
	*/
	private $sessionmodule;

	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\Session", inversedBy="sessionmoduleenchainements", cascade={"persist"})
	*/
	private $session;

	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\User")
	*/
	private $quiinsert;

	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\User")
	*/
	private $quiupdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateinsert;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateupdate;

    /**
     * @ORM\PrePersist
     */
    public function ajout()
    {
        $this->dateinsert = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function modification()
    {
        $this->dateupdate = new \DateTime();
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
     * Set dateinsert
     *
     * @param \DateTime $dateinsert
     *
     * @return SessionModuleEnchainement
     */
    public function setDateinsert($dateinsert)
    {
        $this->dateinsert = $dateinsert;

        return $this;
    }

    /**
     * Get dateinsert
     *
     * @return \DateTime
     */
    public function getDateinsert()
    {
        return $this->dateinsert;
    }

    /**
     * Set dateupdate
     *
     * @param \DateTime $dateupdate
     *
     * @return SessionModuleEnchainement
     */
    public function setDateupdate($dateupdate)
    {
        $this->dateupdate = $dateupdate;

        return $this;
    }

    /**
     * Get dateupdate
     *
     * @return \DateTime
     */
    public function getDateupdate()
    {
        return $this->dateupdate;
    }

    /**
     * Set enchainementmodule
     *
     * @param \App\Entity\EnchainementModule $enchainementmodule
     *
     * @return SessionModuleEnchainement
     */
    public function setEnchainementmodule(\App\Entity\EnchainementModule $enchainementmodule = null)
    {
        $this->enchainementmodule = $enchainementmodule;

        return $this;
    }

    /**
     * Get enchainementmodule
     *
     * @return \App\Entity\EnchainementModule
     */
    public function getEnchainementmodule()
    {
        return $this->enchainementmodule;
    }

    /**
     * Set quiinsert
     *
     * @param \App\Entity\User $quiinsert
     *
     * @return SessionModuleEnchainement
     */
    public function setQuiinsert(\App\Entity\User $quiinsert = null)
    {
        $this->quiinsert = $quiinsert;

        return $this;
    }

    /**
     * Get quiinsert
     *
     * @return \App\Entity\User
     */
    public function getQuiinsert()
    {
        return $this->quiinsert;
    }

    /**
     * Set quiupdate
     *
     * @param \App\Entity\User $quiupdate
     *
     * @return SessionModuleEnchainement
     */
    public function setQuiupdate(\App\Entity\User $quiupdate = null)
    {
        $this->quiupdate = $quiupdate;

        return $this;
    }

    /**
     * Get quiupdate
     *
     * @return \App\Entity\User
     */
    public function getQuiupdate()
    {
        return $this->quiupdate;
    }

    /**
     * Set sessionmodule
     *
     * @param \App\Entity\SessionModule $sessionmodule
     *
     * @return SessionModuleEnchainement
     */
    public function setSessionmodule(\App\Entity\SessionModule $sessionmodule = null)
    {
        $this->sessionmodule = $sessionmodule;

        return $this;
    }

    /**
     * Get sessionmodule
     *
     * @return \App\Entity\SessionModule
     */
    public function getSessionmodule()
    {
        return $this->sessionmodule;
    }

    /**
     * Set session
     *
     * @param \App\Entity\Session $session
     *
     * @return SessionModuleEnchainement
     */
    public function setSession(\App\Entity\Session $session = null)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \App\Entity\Session
     */
    public function getSession()
    {
        return $this->session;
    }
}
