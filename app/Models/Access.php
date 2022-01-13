<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    // use HasFactory;
	protected $table = 'access_tbl';
	protected $fillable =[
        'group_id',
        'menu_id',
        'create',
        'read',
        'update',
        'delete',
        'print',
        'status',
        'user_id'
    ];

    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
