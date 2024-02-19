<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msfs extends Model
{
    use HasFactory;

    protected $table = "msfs";
    protected $primaryKey = "id";
    protected $fillable = ['manufact','model', 'year', 'weight', 'img', 'type', 'model_ORG', 'engineType', 'engineManu', 'cargo', 'travelNum', 'fuelCap', 'maxAlt', 'maxVel', 'flyRange'];
    protected $hidden = ['id'];

    public function scopeAllMsfs() {
        return Msfs::all();
    }

    public function Planes() {
        return $this->belongsTo(Pane::class, 'model_ORG', 'model');
    }
}
