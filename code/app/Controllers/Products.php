<?php namespace App\Controllers;

use App\Models\ProductsModel;

class Products extends BaseController
{
    protected $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel;
    }

    public function getProductByCode()
    {
        $productCode = $this->request->getPost('codigo');

        $result = $this->productsModel->getProductByCode($productCode);

        return $this->response->setJSON($result);
    }

    public function getAllProducts()
    {
        return $this->response->setJSON($this->productsModel->getAllProducts());
    }
}