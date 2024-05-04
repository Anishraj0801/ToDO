<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class active_code extends Model
{
    use HasFactory;

protected $table = 'active_code';


protected $fillable =[
    'name',
    'status'
];
    
}
