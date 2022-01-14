<?php

namespace App\Http\Controllers;

use App\Models\SubMenuAccess;   //nama model
use App\Models\Group;   //nama model
use App\Models\Menu;   //nama model
use App\Models\SubMenu;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubMenuAccessController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ## Tampikan Data
    public function index($group_id,$menu_id)
    {
        $title = "Sub Menu Akses";
        $group = Group::where('id',$group_id)->first();
        $menu = Menu::where('id',$menu_id)->first();
        $sub_menu_access = SubMenuAccess::select('sub_menu_access_tbl.*','sub_menu_name')
                        ->leftJoin('sub_menu_tbl', 'sub_menu_tbl.id', '=', 'sub_menu_access_tbl.menu_id')                
                        ->where('group_id',$group_id)->orderBy('position','ASC')->paginate(25)->onEachSide(1);
        return view('admin.sub_menu_access.index',compact('title','group','menu','sub_menu_access'));
    }

    ## Tampilkan Data Search
    public function search(Request $request, $id)
    {
        $title = "Sub Menu Akses";
        $group = Group::where('id',$id)->first();

        $sub_menu_access = $request->get('search');
        $sub_menu_access = SubMenuAccess::leftJoin('menu_access_tbl', 'menu_access_tbl.id', '=', 'sub_menu_access_tbl.menu_access_id')  
                   ->where('group_id',$id)
                   ->where('name', 'LIKE', '%'.$sub_menu_access.'%')
                   ->orderBy('position','ASC')->paginate(25)->onEachSide(1);
        
        return view('admin.sub_menu_access.index',compact('title','group','sub_menu_access'));
    }
    
    ## Tampilkan Form Create
    public function create($group_id,$menu_id)
    {
        $title = "Sub Menu Akses";
        $group = Group::where('id',$group_id)->first();
        $menu = Menu::where('id',$menu_id)->first();
        $sub_menu = SubMenu::where('menu_id',$menu_id)->get();
        $view=view('admin.sub_menu_access.create',compact('title','group','menu','sub_menu'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store($group_id, $menu_id, Request $request)
    {
        $this->validate($request, [
            'sub_menu_id' => 'required',
            'create' => 'required',
            'read' => 'required',
            'update' => 'required',
            'delete' => 'required',
            'print' => 'required',
        ]);

        $input['group_id'] = $group_id;
        $input['menu_id'] = $menu_id;
        $input['sub_menu_id'] = $request->sub_menu_id;
        $input['create'] = $request->create;
        $input['read'] = $request->read;
        $input['update'] = $request->update;
        $input['delete'] = $request->delete;
        $input['print'] = $request->print;
        $input['user_id'] = Auth::user()->id;
        
        SubMenuAccess::create($input);
        
        activity()->log('Tambah Data Sub Menu Akses');
        return redirect('/sub_menu_akses/'.$group_id.'/'.$menu_id)->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit($group_id, $menu_id, SubMenuAccess $sub_menu_access)
    {
        $title = "Sub Menu Akses";
        $group = Group::where('id',$group_id)->first();
        $menu = Menu::where('id',$menu_id)->first();
        $sub_menu = SubMenu::where('menu_id',$menu_id)->get();
        $view=view('admin.sub_menu_access.edit', compact('title','group','menu','sub_menu','sub_menu_access'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, $group_id, $menu_id, SubMenuAccess $sub_menu_access)
    {
        $this->validate($request, [
            'sub_menu_id' => 'required',
            'create' => 'required',
            'read' => 'required',
            'update' => 'required',
            'delete' => 'required',
            'print' => 'required',
        ]);

        $sub_menu_access->fill($request->all());
        
        $sub_menu_access->user_id = Auth::user()->id;
        $sub_menu_access->save();
        
        activity()->log('Ubah Data Sub Menu Akses dengan ID = '.$sub_menu_access->id);
        return redirect('/sub_menu_akses/'.$group_id.'/'.$menu_id)->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete($group_id, $menu_id, SubMenuAccess $sub_menu_access)
    {
        $sub_menu_access->delete();

        activity()->log('Hapus Data Sub Menu Akses dengan ID = '.$sub_menu_access->id);
        return redirect('/sub_menu_akses/'.$group_id.'/'.$menu_id)->with('status', 'Data Berhasil Dihapus');
    }
}