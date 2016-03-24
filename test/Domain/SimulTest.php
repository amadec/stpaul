<?php
namespace stpaul\IHM;
require_once __DIR__.'/../../src/stpaul/IHM/Simul.php';

/**
 * Class SejourTest
 * @package stpaul\IHM
 */
class SimulTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var sejour
     */
    protected $object;
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Simul();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testSimulReducQFSup500()
    {
        $this->setUp();
        $this->object->setFamQF(400);
        $this->object->setSejMBI(170);


        $resultatAttendu = '17';
        $this->object->setSimulReducQF();
        $resultatObserve = $this->object->getSimulReducQF();

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }
    public function testSimulReducDepartMultiple()
    {
        $this->setUp();
        $this->object->setsimulNbEnfPartant(2);
        $this->object->setSejMBI(170);


        $resultatAttendu = '17';
        $this->object->setSimulReducDepartMultiple();
        $resultatObserve = $this->object->getSimulReducDepartMultiple();

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }
    public function testRevFiscal()
    {
        $this->setUp();
        $this->object->setRevFiscal(15567);


        $resultatAttendu = '15567';
        $resultatObserve = $this->object->getRevFiscal();

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }
    public function testfamQF()
    {
        $this->setUp();
        $this->object->setRevFiscal(15567);
        $this->object->setFamNbEnfant(2);

        $resultatAttendu = '432';
        $this->object->setFamQF();
        $resultatObserve = $this->object->getFamQF();

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }
    public function testSimulCalcul()
    {
        $this->setUp();
        $this->object->setFamQF(400);
        $this->object->setSejMBI(170);
        $this->object->setfamNbEnfant(2);
        $this->object->setsimulNbEnfPartant(1);


        $resultatAttendu = '';
        $resultatObserve = $this->object->calcul();

        $this->assertEquals($resultatAttendu, $resultatObserve);

    }
}
