<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vlan extends Model
{
    use HasFactory;
    protected $fillable=['vlan_name','dispatch_id','start_ip','end_ip'];
    public function dispatch()
    {
        return $this->belongsTo(Dispatch::class,'dispatch_id');
    }
}
