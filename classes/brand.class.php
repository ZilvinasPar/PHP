<?php


class Brand
{

    private $db;
    private $help;
//================== Constructor ===================
    public function __construct()
    {
        $this->db = new Database();
        $this->help = new Helper();

    }
//========== End of constructor ==================

//============= Get all brands ================
public function getAllBrands(){

        $query = "SELECT * FROM e_brand";

        $result = $this->db->getTable($query);

        return $result;

}
//==========================================



}