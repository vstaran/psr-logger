<?php

namespace Logger\writers;

use mysqli;
use Logger\WriterInterface;

/**
 * Class DbWriter
 *
 *
 * DROP TABLE IF EXISTS `default_log`;
 * CREATE TABLE `default_log` (
 * `id` int(11) NOT NULL AUTO_INCREMENT,
 * `date` date DEFAULT NULL,
 * `level` varchar(16) DEFAULT NULL,
 * `message` text DEFAULT NULL,
 * `context` text DEFAULT NULL,
 * PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 *
 * @package Logger\writers
 */

class DbWriter implements WriterInterface
{

    /**
     * @var mysqli DB Connection
     */
    private $connection;

    /**
     * @var string Table name
     */
    private $table = 'default_log';

    /**
     * DbWriter constructor.
     *
     * @param $host
     * @param $user
     * @param $password
     * @param $db
     */
    public function __construct($host, $user, $password, $db)
    {
        $this->connection = new mysqli($host, $user, $password, $db);

        if ($this->connection->connect_errno) {
            printf("connection failed: %s\n", $this->connection->connect_error());
            exit();
        }
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function write(array $data)
    {

        $sql = "INSERT INTO " . $this->table . " (date, level, message, context) " .
            "VALUES ('" . $data['date'] . "', '" . $data['level'] . "', '" . $data['message'] . "', '" . $data['context_line'] . "')";

        $this->connection->query($sql);

    }
}