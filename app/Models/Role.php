<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'salary',
        'benefit',
        'end_date',
        'description',
        'experience_time',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applicantsRoles()
    {
        return $this->belongsToMany(ApplicantRole::class);
    }
}
