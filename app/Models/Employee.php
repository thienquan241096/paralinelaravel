<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'm_employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'avatar',
        'team_id', 'email', 'first_name', 'last_name',
        'gender', 'birthday', 'address',
        'salary', 'position', 'status', 'type_of_work',
        'ins_id', 'upd_id', 'del_flag'
    ];

    public function m_teams()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}