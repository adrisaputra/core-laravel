@extends('admin.layout')
@section('konten')
<div class="content-wrapper">
	<section class="content-header">
	<h1 class="fontPoppins">{{ __($title) }}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
		<li><a href="#"> {{ __($title) }}</a></li>
	</ol>
	</section>
	
	<section class="content">

	<div class="box">   
		<div class="box-header with-border">
			<div class="box-tools pull-left">
				<div style="padding-top:10px">
					<a href="{{ url('/'.Request::segment(1).'/create/'.$group->id.'/'.$menu->id) }}" class="btn btn-success btn-flat" title="Tambah Data">Tambah</a>
					<a href="{{ url('/'.Request::segment(1).'/'.$group->id.'/'.$menu->id) }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>    
					<a href="{{ url('/menu_akses/'.$group->id) }}" class="btn btn-danger btn-flat" title="Refresh halaman">Kembali</a>  
				</div>
			</div>
			<div class="box-tools pull-right">
				<div class="form-inline">
					<form action="{{ url('/'.Request::segment(1).'/search') }}" method="GET">
						<div class="input-sub_menu_access margin">
							<input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian">
							<span class="input-sub_menu_access-btn">
								<button type="submit" class="btn btn-danger btn-flat">cari</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
			
			<div class="table-responsive box-body">

				@if ($message = Session::get('status'))
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i>Berhasil !</h4>
						{{ $message }}
					</div>
				@endif

				<table class="table table-bordered">
					<tr style="background-color: gray;color:white">
						<th style="width: 60px">No</th>
						<th>Nama Sub Menu</th>
						<th>Create</th>
						<th>Read</th>
						<th>Update</th>
						<th>Delete</th>
						<th>Print</th>
						<th style="width: 20%">#Aksi</th>
					</tr>
					@foreach($sub_menu_access as $v)
					<tr>
						<td>{{ ($sub_menu_access ->currentpage()-1) * $sub_menu_access ->perpage() + $loop->index + 1 }}</td>
						<td>{{ $v->sub_menu_name }}</td>
						<td>{{ $v->create }}</td>
						<td>{{ $v->read }}</td>
						<td>{{ $v->update }}</td>
						<td>{{ $v->delete }}</td>
						<td>{{ $v->print }}</td>
						<td>
							<a href="{{ url('/'.Request::segment(1).'/edit/'.$group->id.'/'.$menu->id.'/'.$v->id ) }}" class="btn btn-xs btn-flat btn-warning">Edit</a>
							<a href="{{ url('/'.Request::segment(1).'/hapus/'.$group->id.'/'.$menu->id.'/'.$v->id ) }}" class="btn btn-xs btn-flat btn-danger"  onclick="return confirm('Anda Yakin ?');">Hapus</a>
						</td>
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $sub_menu_access->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection