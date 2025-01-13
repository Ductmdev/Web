<?php

namespace App\Repositories\ProductDetail;

use App\Models\ProductDetail;
use App\Repositories\Base\BaseRepository;

class ProductDetailRepository extends BaseRepository implements IProductDetailRepository
{
    public function getModel(): string
    {
        return ProductDetail::class;
    }

    public function getByProductId($productId)
    {
        return ProductDetail::where('product_id', $productId)->get();
    }

    public function create($data)
    {
        return ProductDetail::create($data);
    }

    public function find($id)
    {
        return ProductDetail::find($id);
    }

    public function update($id, $data)
    {
        $productDetail = $this->find($id);
        if ($productDetail) {
            $productDetail->update($data);
        }
        return $productDetail;
    }

    public function delete($id)
    {
        $productDetail = $this->find($id);
        if ($productDetail) {
            $productDetail->delete();
        }
    }
}
