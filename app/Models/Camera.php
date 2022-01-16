<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'region_id', 'segment_id', 'location_id', 'area_id', 'en_name', 'ar_name', 'operational_state_id',
        'ip', 'vlan_id', 'ch_no', 'record_device_id', 'state', 'dispatch_id', 'maintenance_category_id',
        'maintenance_tool_id', 'cleaning_tool_id', 'camera_type', 'company', 'year', 'alarm', 'gallery', 'ping',
    ];
    public function device()
    {
        return $this->belongsTo(RecordDevice::class,'record_device_id');
    }
    protected $casts = [
        'gallery' => 'array',
    ];
}
