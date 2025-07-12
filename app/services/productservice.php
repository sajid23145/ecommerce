<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productrepository;

    public function __construct(ProductRepository $productRepository)
    {
         $this->productrepository=$productRepository;
    }

    public function getAll($searchterm)
    {
        return $this->productrepository->all($searchterm);
    }

    public function get()
    {
        return $this->productrepository->get();
    }
public function getbyid($id)
    {
return $this->productrepository->find($id);
    }
    public function create(array $data)
    {
    return $this->productrepository->create($data);

    }
    public function update($product,$title,$description,$price,$status,$image,$oldimage)
    {
    return $this->productrepository->update($product,$title,$description,$price,$status,$image,$oldimage);

    }
    public function product()
    {
        return $this->productrepository->product();
    }
    public function order()
    {
                return $this->productrepository->order();

    }
    public function pendingorder()
    {
                return $this->productrepository->pendingorder();

    }

     public function ordercreate(array $data)
    {
    return $this->productrepository->ordercreate($data);

    }

     public function submitlogin($email,$password)
    {
                return $this->productrepository->submit($email,$password);

    }

}
