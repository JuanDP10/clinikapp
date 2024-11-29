@extends('layout')

@section('title')
<title>Clinick App | {{ auth()->user()->name ?? 'NN' }}</title>
@endsection

@section('content')

  <div class="right_col" role="main" style="min-height: 913px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              <h3><i class="fa fa-user"></i> Perfil </h3>
              </div>
              
              <div class="clearfix"></div>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Ver Perfil</h2>
                  <div class="clearfix"></div>
                  <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                      </div>
                    </div>
                  </div>
                  
                  <div class="clearfix"></div>
                  
                  <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        
                        <div class="x_content">
                          <div class="col-md-3 col-sm-3  profile_left text-dark">
                            <div class="profile_img">
                              <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view rounded mx-auto d-block" src="{{ asset('images/' . (Auth::user()->foto ?? 'profile-img.png')) }}" alt="Avatar" height="300px" title="Change the avatar">
                              </div>
                            </div>

                            
                          </div>
                          <div class="text-dark">
                            <h3 class="font-weight-bold">{{ auth()->user()->name ?? 'NN' }}</h3>
                            <ul class="list-unstyled user_data">
                              <li><i class="fa fa-envelope"></i> Correo: {{ isset(Auth::user()->email) ? Auth::user()->email : '@' }}</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection