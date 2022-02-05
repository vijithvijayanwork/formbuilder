<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Forms extends Model {

    protected $table = 'forms';
    public $timestamps = true;
    protected $fillable = [
        'formname',
        'formdata',
        'formaction',
        'formmethod',
    ];

}
