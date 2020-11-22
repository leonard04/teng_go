<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_product;
use Config\View;
use TCPDF;
class Product extends Controller{

    protected $table = "product";

    public function index(){

        $product = new Model_product();
        $products = $product->tampilData()->getResult();
        $category = $product->tampilCategory()->getResult();
            // print_r($products);
        return View('product/index', [
            'products' => $products,
            'categories' => $category,
        ]);
    }

    public function store(){
        $name = $this->request->getPost('product_name');
        $price = $this->request->getPost('price');
        $category = $this->request->getPost('category');

        $data = [
            'product_name' => $name,
            'product_price' => $price,
            'product_category_id' => $category,
        ];
        $product = new Model_product();
        $simpan = $product->insert_product($data);

        if($simpan){
            return redirect()->to(base_url('product')); 
        }
    }

    public function update(){
        $name = $this->request->getPost('product_name');
        $price = $this->request->getPost('price');
        $category = $this->request->getPost('category');
        $id = $this->request->getPost('id');

        $data = [
            'product_name' => $name,
            'product_price' => $price,
            'product_category_id' => $category,
        ];

        $product = new Model_product();
        $simpan = $product->update_product($data,$id);

        if($simpan){
            return redirect()->to(base_url('product')); 
        }
    }

    public function delete($id){
        $product = new Model_product();
        $hapus = $product->delete_product($id);
        if($hapus)
        {
            return redirect()->to(base_url('product'));
        }
    }

    public function print(){
        // return $this->load->view('product/print/viewer');
        $product = new Model_product();
        $products = $product->tampilData()->getResult();
        $html = view('product/print',[
			'products'=> $products,
		]);
        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Leonardo');
		$pdf->SetTitle('Product');
		$pdf->SetSubject('Product List');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

        $pdf->addPage();
        
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        $pdf->Output('ProductList.pdf', 'I');
    }

}