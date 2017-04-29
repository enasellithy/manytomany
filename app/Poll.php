<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
	protected $fillable = [
        'title', 'answer' , 'ends_pt',
    ];

    protected $table = 'polls';
}
