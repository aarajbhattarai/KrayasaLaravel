<?php

namespace Webkul\Vendor\Repositories;

use Webkul\Core\Eloquent\Repository;
use Illuminate\Support\Facades\Hash;

class VendorRepository extends Repository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return 'Webkul\Vendor\Contracts\Vendor';
    }

    /**
     * Create vendor
     */
    public function create(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $vendor = parent::create($data);

        return $vendor;
    }

    /**
     * Update vendor
     */
    public function update(array $data, $id, $attribute = "id")
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return parent::update($data, $id, $attribute);
    }
}