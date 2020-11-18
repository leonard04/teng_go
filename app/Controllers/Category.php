<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_category;
use Config\View;

class Category extends Controller{

    public function index(){
        $product = new Model_category();
        $data =[
            'categories' => $product->tampilData()->getResult(),
        ];
            // print_r($data);
        echo View('viewtampilproduct', $data);
    }
}