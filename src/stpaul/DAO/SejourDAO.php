<?php

namespace stpaul\DAO;

use Doctrine\DBAL\Connection;
use stpaul\Domain\Sejour;

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
            $sejourId = $row['sejno'];
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
        $sejour = new sejours();
        $sejour->setId($row['sejno']);
        $sejour->setIntitule($row['sejintitule']);
        $sejour->setMontant($row['sejmontantmbi']);
        $sejour->setDtedeb($row['sejdtedeb']);
        $sejour->setDuree($row['sejduree']);
        return $sejour;
    }
}