<?php

namespace stpaul\DAO;

use Doctrine\DBAL\Connection;
use stpaul\Domain\Sejour;

/**
 * Class SejourDAO
 * @package stpaul\DAO
 */
class SejourDAO {
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Return a list of all sejours, sorted by date (most recent first).
     *
     * @return array A list of all sejours.
     */
    public function findAll() {
        $sql = "select * from sejour order by sejno desc";
        $result = $this->db->fetchAll($sql);

        // Convert query result to an array of domain objects
        $sejours = array();
        foreach ($result as $row) {
            $sejourId = $row['SEJNO'];
            $sejours[$sejourId] = $this->buildsejour($row);
        }
        return $sejours;
    }

    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \stpaul\Domain\Sejour
     */
    private function buildsejour(array $row) {
        $sejour = new Sejour($row['SEJNO'],$row['SEJINTITULE'],$row['SEJMONTANTMBI'],$row['SEJDTEDEB'],$row['SEJDUREE']);
        $sejour->setNoSejour($row['SEJNO']);
        $sejour->setIntitule($row['SEJINTITULE']);
        $sejour->setMontant($row['SEJMONTANTMBI']);
        $sejour->setDtedeb($row['SEJDTEDEB']);
        $sejour->setDuree($row['SEJDUREE']);
        return $sejour;
    }
}