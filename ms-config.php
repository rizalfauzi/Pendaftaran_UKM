<?php
class Db_Class {
    protected $mysqli;
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "db_user";
     
    public function __construct() {
        $this->mysqli=new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name) or die ($this->mysqli->error);
        return $this->mysqli;
    }
     
    public function getLink() {
        return $this->mysqli;
    }
     
    public function query($query) {
        return $this->mysqli->query($query);
    }
     
    function __destruct() {
        $this->mysqli->close();
    }
}
?>