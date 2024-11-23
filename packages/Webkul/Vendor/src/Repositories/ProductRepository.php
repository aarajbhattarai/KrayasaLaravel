<?php

namespace Webkul\Vendor\Repositories;

use Webkul\Product\Repositories\ProductRepository as BaseProductRepository;

class ProductRepository extends BaseProductRepository
{
    /**
     * Create product.
     *
     * @param  array  $data
     * @return \Webkul\Product\Contracts\Product
     */
    public function create(array $data)
    {
        $data['vendor_id'] = auth()->guard('vendor')->id();

        return parent::create($data);
    }

    /**
     * Update product.
     *
     * @param  array  $data
     * @param  int  $id
     * @param  string  $attribute
     * @return \Webkul\Product\Contracts\Product
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $product = $this->find($id);

        if ($product->vendor_id !== auth()->guard('vendor')->id()) {
            throw new \Exception('Unauthorized action.');
        }

        return parent::update($data, $id, $attribute);
    }

    /**
     * Delete product.
     *
     * @param  int  $id
     * @return void
     */
    public function delete($id)
    {
        $product = $this->find($id);

        if ($product->vendor_id !== auth()->guard('vendor')->id()) {
            throw new \Exception('Unauthorized action.');
        }

        parent::delete($id);
    }

    /**
     * Get all products.
     *
     * @param array $params
     * @return mixed
     */
    public function getAll($params = [])
    {
        $params['vendor_id'] = auth()->guard('vendor')->id();

        return parent::getAll($params);
    }
}