<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantModel extends Model
{
    protected $connection = 'tenant';
}