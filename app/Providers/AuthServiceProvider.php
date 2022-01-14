<?php

namespace App\Providers;
use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('read-data', function ($user) {
            $user  = User::leftJoin('menu_access_tbl', 'menu_access_tbl.id', '=', 'users.group_id')
                        ->where('users.id',Auth::user()->id)->first();
            if($user->read==1){
                return true;
            }
            return null;
        });

        Gate::define('tambah-data', function ($user) {
            $user  = User::leftJoin('menu_access_tbl', 'menu_access_tbl.group_id', '=', 'users.group_id')
                        ->leftJoin('menu_tbl', 'menu_access_tbl.menu_id', '=', 'menu_tbl.id')
                        ->where('users.id',Auth::user()->id)
                        ->where('menu_tbl.link',request()->segment(1))
                        ->first();
            if($user->create==1){
                return true;
            }
            return null;
        });
        
        Gate::define('ubah-data', function ($user) {
            $user  = User::leftJoin('menu_access_tbl', 'menu_access_tbl.group_id', '=', 'users.group_id')
                        ->leftJoin('menu_tbl', 'menu_access_tbl.menu_id', '=', 'menu_tbl.id')
                        ->where('users.id',Auth::user()->id)
                        ->where('menu_tbl.link',request()->segment(1))
                        ->first();
            if($user->update==1){
                return true;
            }
            return null;
        });
        
        Gate::define('hapus-data', function ($user) {
            $user  = User::leftJoin('menu_access_tbl', 'menu_access_tbl.group_id', '=', 'users.group_id')
                        ->leftJoin('menu_tbl', 'menu_access_tbl.menu_id', '=', 'menu_tbl.id')
                        ->where('users.id',Auth::user()->id)
                        ->where('menu_tbl.link',request()->segment(1))
                        ->first();
            if($user->delete==1){
                return true;
            }
            return null;
        });
        
        Gate::define('print-data', function ($user) {
            $user  = User::leftJoin('menu_access_tbl', 'menu_access_tbl.group_id', '=', 'users.group_id')
                        ->leftJoin('menu_tbl', 'menu_access_tbl.menu_id', '=', 'menu_tbl.id')
                        ->where('users.id',Auth::user()->id)
                        ->where('menu_tbl.link',request()->segment(1))
                        ->first();
            if($user->print==1){
                return true;
            }
            return null;
        });
        
    }
}
