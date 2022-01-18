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
			<h3 class="box-title">Tambah {{ __($title) }}</h3>
		</div>
		
		<form action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
			<div class="box-body">
				<div class="col-lg-12">
					
					<div class="form-group @if ($errors->has('name')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Nama User') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('name'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama User" name="name" value="{{ old('name') }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('email')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Email') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('email'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>@endif
							<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('password')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Password') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('password'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>@endif
							<input type="password" class="form-control" placeholder="Password" name="password" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Konfirmasi Password') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('password_confirmation'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password_confirmation') }}</label>@endif
							<input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('group_id')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Group') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('group_id'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('group_id') }}</label>@endif
							<select class="form-control" name="group_id">
								<option value="">- Pilih Group -</option>
								@foreach($group as $v)
									<option value="{{ $v->id }}" @if(old('group_id')=="$v->id") selected @endif>{{ $v->group_name }}</option>
								@endforeach
								<!-- <option value="3" @if(old('group_id')=="3") selected @endif>Pegawai</option> -->
							</select>

						</div>
					</div>
	
					<div class="form-group @if ($errors->has('status')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Status') }}</label>
						<div class="col-sm-10">
							@if ($errors->has('status'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('status') }}</label>@endif
							<select class="form-control" name="status">
								<option value="">- Pilih Status -</option>
								<option value="1" @if(old('status')=="1") selected @endif>Aktif</option>
								<option value="0" @if(old('status')=="0") selected @endif>Tidak Aktif</option>
							</select>

						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<div>
								<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
								<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
								<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
	</section>
</div>

@endsection