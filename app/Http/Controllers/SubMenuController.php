<?php

namespace App\Http\Controllers;

use App\Models\Menu;   //nama model
use App\Models\SubMenu;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubMenuController extends Controller
{
     ## Cek Login
     public function __construct()
     {
         $this->middleware('auth');
     }
     
     ## Tampikan Data
     public function index($id)
     {
         $title = "Sub Menu";
         $menu = Menu::where('id',$id)->first();
         $submenu = SubMenu::where('menu_id',$id)->orderBy('position','ASC')->paginate(25)->onEachSide(1);
         return view('admin.submenu.index',compact('title','menu','submenu'));
     }
 
     ## Tampilkan Data Search
     public function search(Request $request, $id)
     {
         $title = "Sub Menu";
         $menu = Menu::where('id',$id)->first();

         $submenu = $request->get('search');
         $submenu = SubMenu::where('name', 'LIKE', '%'.$submenu.'%')
                 ->orderBy('position','ASC')->paginate(25)->onEachSide(1);
         
         return view('admin.submenu.index',compact('title','menu','submenu'));
     }
     
     ## Tampilkan Form Create
     public function create($id)
     {
         $title = "Sub Menu";
         $menu = Menu::where('id',$id)->first();
         $view=view('admin.submenu.create',compact('title','menu'));
         $view=$view->render();
         return $view;
     }
 
     ## Simpan Data
     public function store($id, Request $request)
     {
         $this->validate($request, [
             'sub_menu_name' => 'required',
             'link' => 'required',
             'position' => 'numeric|required',
             'status' => 'required',
         ]);
 
         $input['menu_id'] = $id;
         $input['sub_menu_name'] = $request->sub_menu_name;
         $input['link'] = $request->link;
         $input['attribute'] = $request->attribute;
         $input['position'] = $request->position;
         $input['desc'] = $request->desc;
         $input['status'] = $request->status;
         $input['user_id'] = Auth::user()->id;
         
         SubMenu::create($input);
         
         activity()->log('Tambah Data Sub Menu');
         return redirect('/submenu/'.$id)->with('status','Data Tersimpan');
     }
 
     ## Tampilkan Form Edit
     public function edit($id, SubMenu $submenu)
     {
         $title = "Sub Menu";
         $menu = Menu::where('id',$id)->first();
         $view=view('admin.submenu.edit', compact('title','menu','submenu'));
         $view=$view->render();
         return $view;
     }
 
     ## Edit Data
     public function update(Request $request, $id, SubMenu $submenu)
     {
        $this->validate($request, [
            'sub_menu_name' => 'required',
            'link' => 'required',
            'position' => 'numeric|required',
            'status' => 'required',
        ]);
 
         $submenu->fill($request->all());
         
         $submenu->user_id = Auth::user()->id;
         $submenu->save();
         
         activity()->log('Ubah Data Sub Menu dengan ID = '.$submenu->id);
         return redirect('/submenu/'.$id)->with('status', 'Data Berhasil Diubah');
     }
 
     ## Hapus Data
     public function delete(SubMenu $submenu)
     {
         $submenu->delete();
 
         activity()->log('Hapus Data Sub Menu dengan ID = '.$submenu->id);
         return redirect('/submenu')->with('status', 'Data Berhasil Dihapus');
     }
}
