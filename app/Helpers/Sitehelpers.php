<?php

namespace App\Helpers;

use App\Models\Menu;   //nama model
use App\Models\SubMenu;   //nama model
use App\Models\MenuAccess;   //nama model
use Illuminate\Support\Facades\Auth;

class SiteHelpers
{
    
    public static function config_menu()
    {
        $menu = MenuAccess::leftJoin('group_tbl', 'menu_access_tbl.group_id', '=', 'group_tbl.id')
                ->leftJoin('menu_tbl', 'menu_access_tbl.menu_id', '=', 'menu_tbl.id')
                ->where('menu_access_tbl.group_id',Auth::user()->group_id)
                ->where('menu_tbl.status',1)
                ->where('menu_tbl.category',1)
                ->orderBy('menu_tbl.position','ASC')
                ->get();
        return $menu;
    }

    public static function main_menu()
    {
        $menu = MenuAccess::leftJoin('group_tbl', 'menu_access_tbl.group_id', '=', 'group_tbl.id')
                ->leftJoin('menu_tbl', 'menu_access_tbl.menu_id', '=', 'menu_tbl.id')
                ->where('menu_access_tbl.group_id',Auth::user()->group_id)
                ->where('menu_tbl.status',1)
                ->where('menu_tbl.category',2)
                ->orderBy('menu_tbl.position','ASC')
                ->get();
        return $menu;
    }

    public static function submenu($id)
    {
        $submenu = SubMenu::where('menu_id',$id)->where('status',1)->orderBy('position','ASC')->get();
        return $submenu;
    }

}
