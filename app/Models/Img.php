<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'img';
    
}
