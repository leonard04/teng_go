<?php
namespace App\Models;

use CodeIgniter\Model;

class Model_product extends Model{
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilData(){
        $builder = $this->db->table('product');
        $builder->select('*');
        $builder->join('category','category.category_id = product.product_category_id','left');
        $query = $builder->get();
        return $query;
    }

    function tampilCategory(){
        $builder = $this->db->table('category');
        $builder->select('*');
        $query = $builder->get();
        return $query;
    }

    function insert_product($data){
        return $this->db->table('product')->insert($data);
    }

    function update_product($data, $id){
        return $this->db->table('product')->update($data, ['product_id' => $id]);
    }

    public function delete_product($id){
        return $this->db->table('product')->delete(['product_id' => $id]);
    }
}