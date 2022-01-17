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
					<a href="{{ url('/'.Request::segment(1).'/create') }}" class="btn btn-success btn-flat" title="Tambah Data">Tambah</a>
					<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat" title="Refresh halaman">Refresh</a>
				</div>
			</div>
			<div class="box-tools pull-right">
				<div class="form-inline">
					<form action="{{ url('/'.Request::segment(1).'/search') }}" method="GET">
						<div class="input-menu margin">
							<input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian">
							<span class="input-menu-btn">
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
						<th>Nama menu</th>
						<th>Link</th>
						<th>Atribute</th>
						<th>Posisi</th>
						<th>Status</th>
						<th style="width: 15%">#Aksi</th>
					</tr>
					@foreach($menu as $v)
					<tr>
						<td>{{ ($menu ->currentpage()-1) * $menu ->perpage() + $loop->index + 1 }}</td>
						<td>{{ $v->menu_name }}</td>
						<td>{{ $v->link }}</td>
						<td>{{ $v->attribute }}</td>
						<td>{{ $v->position }}</td>
						<td>
							@if ($v->status==0)
								<span class="label label-danger">Tidak Aktif</span>
							@elseif  ($v->status==1)
								<span class="label label-success">Aktif</span>
							@endif
						</td>
						<td>
							@if($v->link=="#")
								<a href="{{ url('/sub_menu/'.$v->id ) }}" class="btn btn-xs btn-flat btn-info">Sub Menu</a>
							@endif
							<a href="{{ url('/'.Request::segment(1).'/edit/'.$v->id ) }}" class="btn btn-xs btn-flat btn-warning">Edit</a>
							<a href="{{ url('/'.Request::segment(1).'/hapus/'.$v->id ) }}" class="btn btn-xs btn-flat btn-danger"  onclick="return confirm('Anda Yakin ?');">Hapus</a>
						</td>
					</tr>
					@endforeach
				</table>

			</div>
		<div class="box-footer">
			<!-- PAGINATION -->
			<div class="float-right">{{ $menu->appends(Request::only('search'))->links() }}</div>
		</div>
	</div>
	</section>
</div>
@endsection