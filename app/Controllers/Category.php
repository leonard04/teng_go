<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_category;
use Config\View;

class Category extends Controller{

    public function index(){
        
        $category = new Model_category();
        $category = $category->tampilData()->getResult();
            // print_r($category);
        return View('product_category/index', [
            'categories' => $category,
        ]);
    }

    public function store(){
        $name = $this->request->getPost('category_name');

        $data = [
            'category_name' => $name,
        ];
        $category = new Model_category();
        $simpan = $category->insert_category($data);

        if($simpan){
            return redirect()->to(base_url('category')); 
        }
    }

    public function update(){
        $name = $this->request->getPost('category_name');
        $id = $this->request->getPost('id');

        $data = [
            'category_name' => $name,
        ];

        $category = new Model_category();
        $simpan = $category->update_category($data,$id);

        if($simpan){
            return redirect()->to(base_url('category')); 
        }
    }

    public function delete($id){
        $category = new Model_category();
        $hapus = $category->delete_category($id);
        if($hapus)
        {
            return redirect()->to(base_url('category'));
        }
    }
}