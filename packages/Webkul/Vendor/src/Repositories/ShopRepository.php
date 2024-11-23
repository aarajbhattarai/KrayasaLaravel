<?php

namespace Webkul\Vendor\Repositories;

use Webkul\Core\Eloquent\Repository;

class ShopRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return 'Webkul\Vendor\Contracts\Shop';
    }

    /**
     * Create shop
     */
    public function create(array $data)
    {
        return parent::create($data);
    }

    /**
     * Update shop
     */
    public function update(array $data, $id, $attribute = "id")
    {
        return parent::update($data, $id, $attribute);
    }
}