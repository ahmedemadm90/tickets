<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordDevice extends Model
{
    use HasFactory;
    protected $fillable=['device','channels','location','device_ip','username','password'];
}
