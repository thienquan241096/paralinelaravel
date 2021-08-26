<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'm_employees';

    public function m_teams()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}