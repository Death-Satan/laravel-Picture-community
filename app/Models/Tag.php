<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'tag';
    protected $dateFormat ='U';
    public function getCreatedAtAttribute($key)
    {
        return date('Y-m-d H:i:s',$key);
    }
    public function getUpdatedAtAttribute($key)
    {
        return date('Y-m-d H:i:s',$key);
    }

}
