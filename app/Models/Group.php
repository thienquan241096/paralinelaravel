<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'm_groups';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'ins_id', 'upd_id', 'del_flag',
    ]; // cho phép clinet tương tác với các trường trong db

    // protected static function booted()
    // {
    //     static::addGlobalScope('m_groups', function (Builder $builder) {
    //         $builder->where('created_at', '<', now()->subYears(2000));
    //     });
    // }

    // public function scope()
    // {
    // }

    public function m_teams()
    {
        return $this->hasMany(Team::class, 'group_id', 'id');
    }
}