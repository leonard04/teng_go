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
}