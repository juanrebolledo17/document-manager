<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['filename', 'size', 'uploaded_by', 'downloaded'];
}
