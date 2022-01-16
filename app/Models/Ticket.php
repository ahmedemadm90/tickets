<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['camera_id','details','closed_by','state'];
    public function camera($id)
    {
        $camera = Camera::find($id);
        return $camera;
    }
    public function user()
    {
        return $this->belongsTo(User::class,'closed_by');
    }
}
