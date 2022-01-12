<?php

namespace App\Helpers;

use App\Models\Menu;   //nama model
use App\Models\SubMenu;   //nama model

class SiteHelpers
{
    
    public static function menu()
    {
        $menu = Menu::where('status',1)->orderBy('position','ASC')->get();
        return $menu;
    }

    public static function submenu($id)
    {
        $submenu = SubMenu::where('menu_id',$id)->where('status',1)->orderBy('position','ASC')->paginate(25)->onEachSide(1);
        return $submenu;
    }

}
