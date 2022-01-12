<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // use HasFactory;
	protected $table = 'group_tbl';
	protected $fillable =[
        'name',
        'read',
        'create',
        'update',
        'delete',
        'print',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
    

}
