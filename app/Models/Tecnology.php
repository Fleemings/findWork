<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    use HasFactory;

    protected $table = 'tecnologies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function educationTecnology()
    {
        return $this->hasMany(EducationTecnology::class);
    }

    public function experienceTecnology()
    {
        return $this->hasMany(ExperienceTecnology::class);
    }

    public function roleTecnology()
    {
        return $this->hasMany(RoleTecnology::class);
    }
}
