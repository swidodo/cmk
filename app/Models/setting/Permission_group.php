<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_group extends Model
{
    use HasFactory;
    protected $table ="permissions";
    protected $guarded = ['id'];
}
