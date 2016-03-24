<?php
/**
 * Created by PhpStorm.
 * User: 14madeca
 * Date: 14/03/2016
 * Time: 10:43
 */
namespace stpaul\IHM;

/**
 * Class Simul
 * @package stpaul\IHM
 */
class Simul {

    /**
     * @var
     */
    private $famNom;
    /**
     * @var
     */
    private $famNbEnfant;
    /**
     * @var
     */
    private $RevFiscal;
    /**
     * @var
     */
    private $famQF;

    /**
     * @var
     */
    private $sejNo;
    /**
     * @var
     */
    private $sejMBI;

    /**
     * @var
     */
    private $simulNbEnfPartant;
    /**
     * @var
     */
    private $simulReducQF;
    /**
     * @var
     */
    private $simulReducFamilleNombreuse;
    /**
     * @var
     */
    private $simulReducDepartMultiple;
    /**
     * @var
     */
    private $simulSousTotal;
    /**
     * @var
     */
    private $simulTotalApresReduc;
    /**
     * @var
     */
    private $simulTotalApresPlafond;
    /**
     * @var
     */
    private $simulTotalDepartMultiple;

    /**
     *
     */
    function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getFamNom()
    {
        return $this->famNom;
    }

    /**
     * @param mixed $famNom
     */
    public function setFamNom($famNom)
    {
        $this->famNom = $famNom;
    }

    /**
     * @return mixed
     */
    public function getFamNbEnfant()
    {
        return $this->famNbEnfant;
    }

    /**
     * @param mixed $famNbEnfant
     */
    public function setFamNbEnfant($famNbEnfant)
    {
        $this->famNbEnfant = $famNbEnfant;
    }

    /**
     * @return mixed
     */
    public function getRevFiscal()
    {
        return $this->RevFiscal;
    }

    /**
     * @param mixed $RevFiscal
     */
    public function setRevFiscal($RevFiscal)
    {
        $this->RevFiscal = $RevFiscal;
    }

    /**
     * @return mixed
     */
    public function getFamQF()
    {
        return $this->famQF;
    }

    /**
     * @param mixed $famQF
     */
    public function setFamQF()
    {
        $rev=$this->RevFiscal;
        $nbEnfant=$this->famNbEnfant;
        if ($nbEnfant==1) {
            $this->famQF = (int)($rev/(12*2.5));
        } elseif ($nbEnfant==2) {
            $this->famQF = (int)($rev/(12*3));
        } elseif ($nbEnfant==3) {
            $this->famQF = (int)($rev/(12*4));
        } elseif ($nbEnfant==4) {
            $this->famQF = (int)($rev/(12*5));
        } elseif ($nbEnfant==5) {
            $this->famQF = (int)($rev/(12*6));
        }
    }

    /**
     * @return mixed
     */
    public function getSejNo()
    {
        return $this->sejNo;
    }

    /**
     * @param mixed $sejNo
     */
    public function setSejNo($sejNo)
    {
        $this->sejNo = $sejNo;
    }

    /**
     * @return mixed
     */
    public function getSejMBI()
    {
        return $this->sejMBI;
    }

    /**
     * @param mixed $sejMBI
     */
    public function setSejMBI($sejMBI)
    {
        $this->sejMBI = $sejMBI;
    }

    /**
     * @return mixed
     */
    public function getSimulNbEnfPartant()
    {
        return $this->simulNbEnfPartant;
    }

    /**
     * @param mixed $simulNbEnfPartant
     */
    public function setSimulNbEnfPartant($simulNbEnfPartant)
    {
        $this->simulNbEnfPartant = $simulNbEnfPartant;
    }

    /**
     * @return mixed
     */
    public function getSimulReducQF()
    {
        return $this->simulReducQF;
    }

    /**
     * @param mixed $simulReducQF
     */
    public function setSimulReducQF()
    {
        $QF=$this->famQF;
        $Prix=$this->sejMBI;
        if ($QF<=500) {
            $this->simulReducQF = ($Prix*0.1);
        } else {
            $this->simulReducQF = 0;
        }
    }

    /**
     * @return mixed
     */
    public function getSimulReducFamilleNombreuse()
    {
        return $this->simulReducFamilleNombreuse;
    }

    /**
     * @param mixed $simulReducFamilleNombreuse
     */
    public function setSimulReducFamilleNombreuse()
    {
        $Prix=$this->sejMBI;
        $nbEnfant=$this->famNbEnfant;
        if ($nbEnfant==2){
            $this->simulReducFamilleNombreuse =($Prix*0.2);
        } elseif ($nbEnfant>=3){
            $this->simulReducFamilleNombreuse =($Prix*0.4);
        } else {
            $this->simulReducFamilleNombreuse =0;
        }
    }

    /**
     * @return mixed
     */
    public function getSimulReducDepartMultiple()
    {
        return $this->simulReducDepartMultiple;
    }

    /**
     * @param mixed $simulReducDepartMultiple
     */
    public function setSimulReducDepartMultiple()
    {
        $Prix=$this->sejMBI;
        $nbEnfantPartant=$this->simulNbEnfPartant;
        if ($nbEnfantPartant>1) {
            $this->simulReducDepartMultiple = ($Prix*0.1);
        } else {
            $this->simulReducDepartMultiple =0;
        }
    }

    /**
     * @return mixed
     */
    public function getSimulSousTotal()
    {
        return $this->simulSousTotal;
    }

    /**
     * @param mixed $simulSousTotal
     */
    public function setSimulSousTotal()
    {
        $Prix=$this->sejMBI;
        $ReducQF=$this->getSimulReducQF();
        $ReducNbEnfant=$this->getSimulReducFamilleNombreuse();
        $this->simulSousTotal = ($Prix-$ReducQF-$ReducNbEnfant);
        $this->sejMBI=$this->simulSousTotal;
    }

    /**
     * @return mixed
     */
    public function getSimulTotalApresReduc()
    {
        return $this->simulTotalApresReduc;
    }

    /**
     * @param mixed $simulTotalApresReduc
     */
    public function setSimulTotalApresReduc()
    {
        $Prix=$this->sejMBI;
        $ReducMultiDep=$this->getSimulReducDepartMultiple();
        $this->simulTotalApresReduc = ($Prix-$ReducMultiDep);
        $this->sejMBI=$this->simulTotalApresReduc;
    }

    /**
     * @return mixed
     */
    public function getSimulTotalApresPlafond()
    {
        return $this->simulTotalApresPlafond;
    }

    /**
     * @param mixed $simulTotalApresPlafond
     */
    public function setSimulTotalApresPlafond()
    {
        $Prix=$this->sejMBI;
        if ($Prix>100) {
            $this->simulTotalApresPlafond = 100;
        } else {
            $this->simulTotalApresPlafond = $Prix;
        }
        $this->sejMBI=$this->simulTotalApresPlafond;
    }

    /**
     * @return mixed
     */
    public function getSimulTotalDepartMultiple()
    {
        return $this->simulTotalDepartMultiple;
    }

    /**
     * @param mixed $simulTotalDepartMultiple
     */
    public function setSimulTotalDepartMultiple()
    {
        $Prix=$this->sejMBI;
        $nbEnfantPartant=$this->simulNbEnfPartant;
        $this->simulTotalDepartMultiple = $Prix*$nbEnfantPartant;
    }

    /**
     *
     */
    public function calcul(){
        $this->setSimulReducQF();
        $this->setSimulReducFamilleNombreuse();
        $this->setSimulSousTotal();
        $this->setSimulReducDepartMultiple();
        $this->setSimulTotalApresReduc();
        $this->setSimulTotalApresPlafond();
        $this->setSimulTotalDepartMultiple();
    }

}