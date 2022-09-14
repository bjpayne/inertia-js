<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Recordings extends \Eloquent
{
    protected $connection = 'mysql';

    protected $table = 'recordings';

    protected $appends = ['call_date'];

    public function getCallDateAttribute()
    {
        $call_date = \Carbon\Carbon::parse($this->created_at)
            ->format('m/d/Y h:i:s');

        return $call_date;
    }
}
