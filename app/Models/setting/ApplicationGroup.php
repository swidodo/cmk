<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationGroup extends Model
{
    use HasFactory;
    protected $table ='group_applications';
    protected $guarded =['id'];

    public function application(){
        return $this->belongsTo(Application::class);
    }

}
