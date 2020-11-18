<?php
namespace App\Models;

use CodeIgniter\Model;

class Model_category extends Model{
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilData(){
        return $this->db->table('category')->get();
    }
}