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

    public function scopeEmail($query, $email)
    {
        return $query->where('email', 'like', "%" . $email . "%");
    }

    public function scopeTeamId($query, $team_id)
    {
        return $query->where('team_id', '=', $team_id);
    }

    public function getNameAttribute()
    {
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }

    public function setAdressAttribute($address)
    {
        $this->attributes['address'] = ucfirst($address);
    }

    public function m_teams()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}