<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table ='applications';
    protected $guarded = ['id'];

    public function applicationGroup(){
        return $this->belongsTo(ApplicationGroup::class);
    }
}
