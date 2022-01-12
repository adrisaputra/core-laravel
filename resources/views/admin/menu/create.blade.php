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
					
					<div class="form-group @if ($errors->has('menu_name')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Nama Menu') }} <span class="required" style="color: #dd4b39;">*</span></label>
						<div class="col-sm-10">
							@if ($errors->has('menu_name'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('menu_name') }}</label>@endif
							<input type="text" class="form-control" placeholder="Nama Menu" name="menu_name" value="{{ old('menu_name') }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('link')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Link') }} <span class="required" style="color: #dd4b39;">*</span></label>
						<div class="col-sm-10">
							@if ($errors->has('link'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('link') }}</label>@endif
							<input type="text" class="form-control" placeholder="Link" name="link" value="{{ old('link') }}" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Atribute') }}</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Atribute" name="attribute" value="{{ old('attribute') }}" >
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('position')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Posisi') }} <span class="required" style="color: #dd4b39;">*</span></label>
						<div class="col-sm-10">
							@if ($errors->has('position'))<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('position') }}</label>@endif
							<input type="number" class="form-control" placeholder="Posisi" name="position" value="{{ old('position') }}" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">{{ __('Deskripsi') }}</label>
						<div class="col-sm-10">
							<textarea class="form-control" placeholder="Deskripsi" name="desc">{{ old('desc') }}</textarea>
						</div>
					</div>
					
					<div class="form-group @if ($errors->has('status')) has-error @endif">
						<label class="col-sm-2 control-label">{{ __('Status') }} <span class="required" style="color: #dd4b39;">*</span></label>
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
							<button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data"> Simpan</button>
							<button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button>
							<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-warning btn-flat btn-sm" title="Kembali">Kembali</a>
						</div>
					</div>
					
				</div>
			</div>
		</form>
	</div>
	</section>
</div>

@endsection