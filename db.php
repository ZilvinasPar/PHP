<?php
class Database
{
    private $host = DB_HOST;
    private $user   = DB_USER;
    private $pass   = DB_PASS;
    private $dbname = DB_NAME;

    public $link;
    private $error;

    public function __construct()
    {
        $this->dbConnect();
    }

    private function dbConnect()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if (!$this->link) {
            echo $this->error = "Connection FAILED!" . $this->link->connect_error;
            return false;
        }
    }
    //get Table Row
        public function getRow($sql){

            $result = $this->link->query($sql);

            return $result;
        }

        // Get table array
        public function getTable($sql){
            $result = $this->link->query($sql);
            $returnResult = array();
            while($row = $result->fetch_assoc()){
                $returnResult[] = $row;
            }
            return $returnResult;
        }

        public function insert($sql){
            $this->link->query($sql);
        }
    public function update($sql){
        $this->link->query($sql);
    }
    public function delete($sql){
        $this->link->query($sql);
    }

}


