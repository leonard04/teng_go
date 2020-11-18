<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_product;
use Config\View;

class Product extends Controller{

    public function index(){
        $product = new Model_product();
        $data =[
            'products' => $product->tampilData()->getResult(),
        ];
            // print_r($data);
        echo View('viewtampilproduct', $data);
    }
}