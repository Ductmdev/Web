<?php

namespace App\Repositories\ProductDetail;

use App\Repositories\Base\IBaseRepository;

interface IProductDetailRepository extends IBaseRepository
{
    public function getByProductId($productId);

    public function create($data);

    public function find($id);

    public function update($id, $data);

    public function delete($id);
}