<?php

namespace App\Http\Controllers;

use App\Models\Access;   //nama model
use App\Models\Group;   //nama model
use App\Models\Menu;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccessController extends Controller
{
     ## Cek Login
     public function __construct()
     {
         $this->middleware('auth');
     }
     
     ## Tampikan Data
     public function index($id)
     {
         $title = "Akses";
         $group = Group::where('id',$id)->first();
         $access = Access::leftJoin('menu_tbl', 'access_tbl.menu_id', '=', 'menu_tbl.id')
                    ->where('group_id',$id)->orderBy('position','ASC')->paginate(25)->onEachSide(1);
         return view('admin.access.index',compact('title','group','access'));
     }
 
     ## Tampilkan Data Search
     public function search(Request $request, $id)
     {
         $title = "Akses";
         $group = Group::where('id',$id)->first();

         $access = $request->get('search');
         $access = Access::leftJoin('menu_tbl', 'access_tbl.menu_id', '=', 'menu_tbl.id')
                    ->where('group_id',$id)
                    ->where('name', 'LIKE', '%'.$access.'%')
                    ->orderBy('position','ASC')->paginate(25)->onEachSide(1);
         
         return view('admin.access.index',compact('title','group','access'));
     }
     
     ## Tampilkan Form Create
     public function create($id)
     {
         $title = "Akses";
         $group = Group::where('id',$id)->first();
         $menu = Menu::get();
         $view=view('admin.access.create',compact('title','group','menu'));
         $view=$view->render();
         return $view;
     }
 
     ## Simpan Data
     public function store($id, Request $request)
     {
         $this->validate($request, [
             'menu_id' => 'required',
             'create' => 'required',
             'read' => 'required',
             'update' => 'required',
             'delete' => 'required',
             'print' => 'required',
         ]);
 
         $input['group_id'] = $id;
         $input['menu_id'] = $request->menu_id;
         $input['create'] = $request->create;
         $input['read'] = $request->read;
         $input['update'] = $request->update;
         $input['delete'] = $request->delete;
         $input['print'] = $request->print;
         $input['user_id'] = Auth::user()->id;
         
         Access::create($input);
         
         activity()->log('Tambah Data Akses');
         return redirect('/akses/'.$id)->with('status','Data Tersimpan');
     }
 
     ## Tampilkan Form Edit
     public function edit($id, Access $access)
     {
         $title = "Akses";
         $group = Group::where('id',$id)->first();
         $view=view('admin.access.edit', compact('title','group','access'));
         $view=$view->render();
         return $view;
     }
 
     ## Edit Data
     public function update(Request $request, $id, Access $access)
     {
        $this->validate($request, [
            'sub_group_name' => 'required',
            'link' => 'required',
            'position' => 'numeric|required',
            'status' => 'required',
        ]);
 
         $access->fill($request->all());
         
         $access->user_id = Auth::user()->id;
         $access->save();
         
         activity()->log('Ubah Data Akses dengan ID = '.$access->id);
         return redirect('/akses/'.$id)->with('status', 'Data Berhasil Diubah');
     }
 
     ## Hapus Data
     public function delete(Access $access)
     {
         $access->delete();
 
         activity()->log('Hapus Data Akses dengan ID = '.$access->id);
         return redirect('/akses')->with('status', 'Data Berhasil Dihapus');
     }
}
