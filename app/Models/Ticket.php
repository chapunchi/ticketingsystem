<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ticket extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * Get the value used to index the model.
     *
     * @return mixed
     */
    public function getCustomerKey()
    {
        return $this->name;
    }

    /**
     * Get the key name used to index the model.
     *
     * @return mixed
     */
    public function getCustomerKeyName()
    {
        return 'name';
    }
}
