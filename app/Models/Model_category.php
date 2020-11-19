<?php
namespace App\Models;

use CodeIgniter\Model;

class Model_category extends Model{
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilData(){
        $builder = $this->db->table('category');
        $builder->select('*');
        $query = $builder->get();
        return $query;
    }

    function insert_category($data){
        return $this->db->table('category')->insert($data);
    }

    function update_category($data, $id){
        return $this->db->table('category')->update($data, ['category_id' => $id]);
    }

    function delete_category($id){
        return $this->db->table('category')->delete(['category_id' => $id]);
    }
}