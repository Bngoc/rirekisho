@extends('xAuth.begin')
<title>Đăng nhập</title>
@section('content')
    <!--div  class="page-title"><h3>Tạo CV mới</h3></div-->

    <form id="login" class="form-horizontal my-forms "
          role="form" method="POST" action="/auth/login">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="h3-title">
            <h3 class="clao"><i class="fa fa-lock form-inline"></i> Đăng nhập</h3>
        </div>

        <fieldset id="" class="fix">
                <ul class="">
                    <li>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>

                <li class="">
                    <div class="" style="">
                        <label class="label" for="email">Email </label>
                        <div class="input">
                            <label class="icon-right" for="email">
                                <i class="fa fa-user"></i>
                            </label>
                            <input type="email" class="input-right" placeholder="Email" name="email"
                                   value="{{ old('email') }}">
                        </div>
                    </div>
                </li>
                <li class="">
                    <div class="" style="">
                        <div class="disline">
                        <label class="fix-lable col-xs-5" for="password">Password </label>
                        <a href="#">forgot password </a>
                        </div>
                        <div class="input">
                            <label class="icon-right" for="Password">
                                <i class="fa fa-key"></i>
                            </label>
                            <input type="password" class="input-right" placeholder="Password" name="password">
                        </div>
                    </div>

                </li>

            </ul>
        </fieldset>
              <div class="clr">
                  <li class="col-md-5">
                      <label class="checkbox">
                          <input type="checkbox" name="remember">
                          <i></i>
                          Remember me.
                      </label>
                  </li>
                    <li class="col-md-7">
                        <input type="submit" form="login" name="submit" value="Đăng nhập" class="float_right b-purple col-md-12">
                    </li>


                        <a href="{{url('auth/register')}}">You don't have an account yet? Register here</a>

           </div>



    </form>


@stop