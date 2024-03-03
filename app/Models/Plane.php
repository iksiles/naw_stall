<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo de la tabla que usa los aviones reales
class Plane extends Model
{
    use HasFactory;

    protected $table = "plane";
    protected $primaryKey = "id";
    protected $fillable = ['manufact','model', 'year', 'weight', 'img', 'type'];
    protected $hidden = ['id'];

    public function scopeAllPlanes() {
        return Plane::all();
    }

    public function obtenerPlanePorId() {
        return Plane::find($id);
    }

    public function obtenerPlanePorModelo($modelPlane) {
        return Plane::find($model);
    }

    public function obtenerPlanePorManufacturador() {
        return Plane::find($manufact);
    }

    public function obtenerPlanePorYear() {
        return Plane::find($year);
    }

    public function obtenerPlanePorWeight() {
        return Plane::find($weight);
    }

    // Uso de la relación con Msfs
    public function obtenerMsfs() {
        return $this->hasMany(Msfs::class);
    }

}
