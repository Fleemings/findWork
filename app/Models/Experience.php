<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experiences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'company_name',
        'city',
        'start_date',
        'end_date',
        'currently',
        'description',
        'applicant_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function tecnology()
    {
        return $this->belongsToMany(ExperienceTecnology::class);
    }
}
