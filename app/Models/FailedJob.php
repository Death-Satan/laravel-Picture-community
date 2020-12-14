<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class FailedJob extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'failed_jobs';
    public $timestamps = false;

}
