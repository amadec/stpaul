<?php

namespace stpaul\Domain;
use Doctrine\DBAL\Types\StringType;


/**
 * Class Sejour
 * @package stpaul\Domain
 */
class Sejour
/**  */
{
    /**
     * @var
     */
    private $no_sejour;
    /**
     * @var
     */
    private $intitule;
    /**
     * @var
     */
    private $montant;
    /**
     * @var
     */
    private $dte_deb;
    /**
     * @var
     */
    private $duree;

    /**
     * @param $no_sejour
     * @param $intitule
     * @param $montant
     * @param $dte_deb
     * @param $duree
     */
    function __construct($no_sejour, $intitule, $montant, $dte_deb, $duree)
    {
        $this->no_sejour = $no_sejour;
        $this->intitule = $intitule;
        $this->montant = $montant;
        $this->dte_deb =$dte_deb;
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getNoSejour()
    {
        return $this->no_sejour;
    }

    /**
     * @param mixed $no_sejour
     */
    public function setNoSejour($no_sejour)
    {
        $this->no_sejour = $no_sejour;
    }

    /**
     * @return mixed
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param mixed $intitule
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return mixed
     */
    public function getDteDeb()
    {
        return $this->dte_deb;
    }

    /**
     * @param mixed $dte_deb
     */
    public function setDteDeb($dte_deb)
    {
        $this->dte_deb = $dte_deb;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }


    /**
     * Retourne la date de fin de séjour
     * @return mixed
     */
    public function getSejDteFin()
    {
        $d1= new \DateTime($this->dte_deb);
        $d2=($this->duree);
        $d1->modify('+'.$d2.' day');
        return $d1->format('Y-m-d');
    }

    /**
     * Formatage jj-mm-aaaa
     * @param $pDte : date à formater
     * @return mixed
     */
    public function getSejDteFormatFR($pDte)
    {
        $pDte=new \DateTime($pDte);
        return $pDte->format('d-m-Y');
    }


}
?>
