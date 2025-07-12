<?php

namespace App\Services;

use App\Repositories\ordershowrepository;
use App\Repositories\ProductRepository;

class ordershowService
{
    protected $ordershowrepository;

    public function __construct(ordershowrepository $ordershowrepository)
    {
         $this->ordershowrepository=$ordershowrepository;
    }

    public function getAll()
    {
    }

    public function get()
    {

    }
public function getbyid($ordid)
    {
return $this->ordershowrepository->find($ordid);
    }
    public function create($title,$description,$price,$image,$status)
    {
return $this->ordershowrepository->create($title,$description,$price,$image,$status);
    }




}
