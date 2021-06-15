<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model
{
    public function search(string $filter = null, string $field = 'id')
    {
        if (!$filter) {
            return $this->paginate();
        }

        return $this->where($field, 'LIKE', '%' . trim($filter) . '%')->paginate();
    }
}
