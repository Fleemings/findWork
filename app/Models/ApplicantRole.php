<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantRole extends Model
{
    use HasFactory;

    protected $table = 'applicants_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
