<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'school',
        'degree',
        'start_date',
        'end_date',
        'description',
        'currently',
        'applicant_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function tecnology()
    {
        return $this->belongsTo(EducationTecnology::class);
    }
}
