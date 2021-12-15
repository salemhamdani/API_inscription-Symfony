<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // Pour la gestion des validations.

/**
 * ModaliteEvaluationCompetence
 *
 * @ORM\Table(name="modalite_evaluation_competence")
 * @ORM\Entity(repositoryClass="App\Repository\ModaliteEvaluationCompetenceRepository")
 * @ORM\HasLifecycleCallbacks() 
 */
class ModaliteEvaluationCompetence
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
	* @ORM\ManyToOne(targetEntity="App\Entity\ModaliteEvaluation", inversedBy="modaliteevaluationcompetence",cascade={"persist"})
	*/
	private $modaliteevaluation;

	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\Competence", inversedBy="modaliteevaluationcompetence")
	*/
	private $competence;
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
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre = 0;

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
     * @return BlocCompetence
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
     * @return BlocCompetence
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
     * Set modaliteevaluation
     *
     * @param \App\Entity\ModaliteEvaluation $modaliteevaluation
     *
     * @return BlocCompetence
     */
    public function setModaliteEvaluation(\App\Entity\ModaliteEvaluation $modaliteevaluation = null)
    {
        $this->modaliteevaluation = $modaliteevaluation;

        return $this;
    }

    /**
     * Get modaliteevaluation
     *
     * @return \App\Entity\ModaliteEvaluation
     */
    public function getModaliteEvaluation()
    {
        return $this->modaliteevaluation;
    }

    /**
     * Set competence
     *
     * @param \App\Entity\Competence $competence
     *
     * @return BlocCompetence
     */
    public function setCompetence(\App\Entity\Competence $competence = null)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return \App\Entity\Competence
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Set quiinsert
     *
     * @param \App\Entity\User $quiinsert
     *
     * @return BlocCompetence
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
     * @return BlocCompetence
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
     * Constructor
     */
    public function __construct()
    {
        $this->sessionparcoursbloccompetences = new \Doctrine\Common\Collections\ArrayCollection();
    }

  
    
    /**
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return BlocCompetence
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

}
