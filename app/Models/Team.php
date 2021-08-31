<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'm_teams';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'group_id', 'ins_id', 'upd_id', 'del_flag',
    ];

    // áp dụng cứng lẫn mềm
    public function scopeGroup_id($query, $group_id)
    {
        return $query->where('group_id', '=', $group_id);
    }

    public function m_groups()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function m_employees()
    {
        return $this->hasMany(Employee::class, 'team_id', 'id');
    }
}
