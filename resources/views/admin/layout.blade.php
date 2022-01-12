<!DOCTYPE html>
<html>
@php
    $pengaturan = DB::table('pengaturan_tbl')->find(1);
@endphp
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>{{ $pengaturan->nama_aplikasi }}</title>
        
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('upload/pengaturan/'.$pengaturan->logo_kecil) }}" rel="icon">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap/dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/font-awesome/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/Ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-plugin/iCheck/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-plugin/timepicker/bootstrap-timepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/fullcalendar/dist/fullcalendar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-component/fullcalendar/dist/fullcalendar.print.css') }}" media="print">
        
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-dist/css/AdminLTE.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/core-admin/core-dist/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker|Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400&display=swap" rel="stylesheet"> 
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

        <style type="text/css">
            .fontQuicksand{
                font-family: 'Quicksand', sans-serif;
            }

            .fontPoppins{
                font-family: 'Poppins', sans-serif;
            }

            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
            }

            .preloader .loading {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                font: 14px arial;
            }

            .dropzone {
                border: 2px dashed #0087F7;
            }
        </style>
        
        
        <script>
			
			function formatRupiah(objek, separator) {
                  a = objek.value;
                  b = a.replace(/[^\d]/g,"");
                  c = "";
                  panjang = b.length;
                  j = 0;
                  for (i = panjang; i > 0; i--) {
                    j = j + 1;
                    if (((j % 3) == 1) && (j != 1)) {
                      c = b.substr(i-1,1) + separator + c;
                    } else {
                      c = b.substr(i-1,1) + c;
                    }
                  }
                  objek.value = c;
            }
                
        </script>

    </head>

    <body class="{{ $pengaturan->layout }} sidebar-mini {{ $pengaturan->skin }} fontPoppins">
        <div class="preloader">
			<div class="loading text-center">
				<img src="{{ asset('/assets/core-images/load.gif') }}" width="50">
                <br>
				<p><b class="fontPoppins">Harap Tunggu</b></p>
			</div>
		</div>
        <div class="wrapper">
            <header class="main-header">
                <a href="" class="logo">
                    <span class="logo-mini"><b>{{ $pengaturan->singkatan_nama_aplikasi }}</b></span>
                    <span class="logo-lg"><b>{{ $pengaturan->singkatan_nama_aplikasi }}</b></span>
                </a>
                
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle fa fa-bars" data-toggle="push-menu" role="button" style=" float: left;background-color: transparent;background-image: none;padding: 15px 15px;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if(Auth::user()->foto)
                                    <img src="{{ asset('upload/foto/'.Auth::user()->foto) }}" class="user-image" alt="User Image">   
                                @else
                                    <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="user-image" alt="User Image">   
                                @endif                             
						  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                    @if(Auth::user()->foto)
                                        <img src="{{ asset('upload/foto/'.Auth::user()->foto) }}" class="img-circle" alt="User Image">    
                                    @else
                                        <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="img-circle" alt="User Image">   
                                    @endif                                          
								<p>
                                    {{ Auth::user()->name }}                                            
								    <small>Member since<br> {{ Auth::user()->created_at }} </small>
                                        </p>
                                    </li>
                                    
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ url('/user/edit_profil/'.Auth::user()->id) }}" class="btn btn-default btn-flat">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ url('logout-sistem') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-google btn-flat">Sign out</a>
									<form id="logout-form" action="{{ url('logout-sistem') }}" method="POST" style="display: none;">
											@csrf
									</form>
                                        </div>
                                    </li>
                                </ul>
                            </li>   
                            @if(Auth::user()->group_id==1)
                                <li>
                                    <a href="{{ url('pengaturan') }}" title="Pengaturan Aplikasi"><i class="fa fa-cogs"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </header>
            
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            @if(Auth::user()->foto)
                                <img src="{{ asset('upload/foto/'.Auth::user()->foto) }}" class="img-circle" alt="User Image">    
                            @else
                                <img src="{{ asset('assets/profile-1-20210205190338.png') }}" class="img-circle" alt="User Image">   
                            @endif                          
					</div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->name }}  </p>                            
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>

                            <li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}"><a href="{{ url('dashboard')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                            @foreach( SiteHelpers::menu() as $v)
                                @if($v->link=="#")
                                <li class="treeview  @foreach( SiteHelpers::submenu($v->id) as $x) {{ (request()->is($x->link.'*')) ? 'active' : '' }} @endforeach">
                                    <a href="#"> <i class="{{ $v->attribute }}"></i> <span>{{ $v->menu_name }}</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        @foreach( SiteHelpers::submenu($v->id) as $x)
                                            <li class="{{ (request()->is($x->link.'*')) ? 'active' : '' }}"><a href="{{ url($x->link)}}"><i class="fa fa-circle-notch"></i> {{ $x->sub_menu_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>  
                                @else
                                    <li class="{{ (request()->is($v->link.'*')) ? 'active' : '' }}"><a href="{{ url($v->link)}}"><i class="{{ $v->attribute }}"></i> <span>{{ $v->menu_name }}</span></a></li>
                                @endif
                            @endforeach
                            {{--<li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}"><a href="{{ url('dashboard')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                            <li class="treeview  {{ (request()->is('rekapitulasi_jumlah_pegawai*','rekapitulasi_jumlah_pegawai_bidang*','rekapitulasi_esselon*','rekapitulasi_gender_bidang*','rekapitulasi_golongan*',
                            'rekapitulasi_pendidikan*','rekapitulasi_asn_aktif*','rekapitulasi_asn_non_aktif*','rekapitulasi_cuti*','rekapitulasi_pensiunan*','rekapitulasi_pensiunan*')) ? 'active' : '' }}">
                                <a href="#"> <i class="fa fa-database"></i> <span>Rekapitulasi</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{{ (request()->is('rekapitulasi_jumlah_pegawai')) ? 'active' : '' }}"><a href="{{ url('rekapitulasi_jumlah_pegawai')}}"><i class="fa fa-circle-notch"></i> Jumlah Pegawai</a></li>
                                </ul>
                            </li>  
                            <li class="{{ (request()->is('pegawai*')) ? 'active' : '' }}"><a href="{{ url('pegawai')}}"><i class="fa fa-circle-notch"></i> <span>Tayangan Data</span></a></li>
                            --}}
                            <li class="header">CORE BASE</li>
                            <li class="{{ (request()->is('log*')) ? 'active' : '' }}"><a href="{{ url('log')}}"><i class="fa fa-circle-notch"></i> <span>Log Activity</span></a></li>
                            @if(Auth::user()->group_id==1)
                                <li class="treeview  {{ (request()->is('user*','group*','menu*')) ? 'active' : '' }}">
                                    <a href="#"> <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="{{ (request()->is('user')) ? 'active' : '' }}"><a href="{{ url('user')}}"><i class="fa fa-circle-notch"></i> User</a></li>
                                        <li class="{{ (request()->is('group')) ? 'active' : '' }}"><a href="{{ url('group')}}"><i class="fa fa-circle-notch"></i> Group</a></li>
                                        <li class="{{ (request()->is('menu')) ? 'active' : '' }}"><a href="{{ url('menu')}}"><i class="fa fa-circle-notch"></i> Menu</a></li>
                                    </ul>
                                </li> 
                            @endif
                        
                    </ul>
                </section>
            </aside><!-- Styles -->

		  @yield('konten')

		             
		  <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.0.1
                </div>
               
            </footer>
            
        </div>
       
        <!-- <script src="{{ asset('/assets/core-admin/core-component/jquery/dist/jquery.min.js') }}"></script> -->
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-plugin/timepicker/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-plugin/iCheck/icheck.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-component/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('/assets/core-admin/core-dist/js/demo.js') }}"></script>
        <!-- fullCalendar -->
        <!-- jQuery UI 1.11.4 -->
        <!-- <script src="{{ asset('assets/core-admin/core-component/jquery-ui/jquery-ui.min.js') }}"></script> -->
         <script src="{{ asset('assets/core-admin/core-component/moment/moment.js') }}"></script>
        <script src="{{ asset('assets/core-admin/core-component/fullcalendar/dist/fullcalendar.js') }}"></script>
        
        <script>
            $(document).ready(function () {
              $('.sidebar-menu').tree();
              $('.preloader').fadeOut();

              $("#rowpage").change(function(){
					var row = $("#rowpage").val();
					$.ajax({
						type      : "POST",
						url       : "{{ asset('/admin/setting/setRows",
						data      : {row: row},
						success   : function(msg){
							location.reload();
						}
					});
				});


                //Select2
                $('.select2').select2();

                //Date picker
                $('.datepicker').datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd'
                })

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass   : 'iradio_minimal-blue'
                });

                //Colorpicker
                $('.colorpicker').colorpicker();

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: true
                });

                //Date range picker
                $('.reservation').daterangepicker();

            })
        </script>

    </body>
</html>