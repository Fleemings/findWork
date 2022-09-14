<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantRole extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicants_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }
}
