<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'salary',
        'benefit',
        'description',
        'experience_time',
        'company_id'
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
