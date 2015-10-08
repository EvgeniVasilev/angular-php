<?php

/**
 * Description of DB
 *
 * @author Evgeni Vasilev
 */
class DB {

    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $dsn;

    function connect($host, $user, $pass, $db_name) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db_name = $db_name;


        try {
            $this->dsn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->pass);
            $this->dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // echo $e->getMessage();
            file_put_contents("../logs/db_log.txt", $e->getMessage(), FILE_APPEND);
        }

        return $this->dsn;
    }

    function __destruct() {
        $this->dsn = null;
    }

}
