@extends('xCV.template')
<title>Thêm thông tin người dùng</title>

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-{{Session::get('flash_level')}}">{{ Session::get('message') }}</div>
    @endif
    <form action="{{action('UsersController@postAddUser')}}" method="post" class="my-forms" id="profile-forms" enctype="multipart/form-data">
        <fieldset id="field-box">
            <label slide-header="true"><h3>Thông tin tài khoản </h3></label>
            <hr>
            <div class="float_left" style="width: 30%;">
                <div class="dropzone-container" style="margin: 30px 0 0 30px;">
                    <div id="dropzone">
                        <div>
                            <span class="dropzone-text">Upload photos</span>
                        </div>
                        <input type="file" accept="image/png,image/jpeg" name="txtImage"/>
                    </div>
                    <i> Click to edit</i>
                </div>
                <div class="clear-fix"></div> <hr>
                <div class="form-group">
                    <label class="title">User Level</label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="1" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="2" type="radio">Member
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="3" type="radio">Member
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="4" checked="checked" type="radio">Member
                        </label>
                </div>

            </div>
            <div class="float_left" style="width: 60%;  ">
                {{--<input name="_method" type="hidden" value="PUT">--}}
                <ul slide-toggle=true>
                    <li class="bottom_20px">
                        <div class="float_right " style="width: 80%;">
                            <label class="label" for="name">Username <i style="color: red;">*</i></label>
                            <div class="input">
                                <label class="icon-right" for="name">
                                    <i class="fa fa-user"></i>
                                </label>
                                <input required="required" type="text" placeholder="Username" class="input-right"  name="txtName" value="{!! old('txtName') !!}">
                                @if ($errors->has('txtName'))
                                    <span class="help-block">
							            {{ $errors->first('txtName') }}
						            </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right" style="width: 80%;">
                            <label class="label" for="email">Email <i style="color: red;">*</i> </label>
                            <div class="input">
                                <label class="icon-right" for="email">
                                    <i class="fa fa-envelope-o"></i>
                                </label>
                                <input required="required" type="email" class="input-right" placeholder="Email" name="txtEmail" value="{!! old('txtEmail') !!}">
                                @if ($errors->has('txtEmail'))
                                    <span class="help-block">
							           {{ $errors->first('txtEmail') }}
						            </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right" style="width: 80%;">
                            <label class="label" for="email">Password <i style="color: red;">*</i></label>
                            <div class="input">
                                <label class="icon-right" for="Password">
                                    <i class="fa fa-key"></i>
                                </label>
                                <input type="password" required="required" class="input-right" placeholder="Password" name="txtPass" value="{!! old('txtPass') !!}">
                                @if ($errors->has('txtPass'))
                                    <span class="help-block">
							           {{ $errors->first('txtPass') }}
						            </span>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="bottom_20px">
                        <div class="float_right" style="width: 80%;">
                            <label class="label" for="email">Re-Password <i style="color: red;">*</i></label>
                            <div class="input">
                                <label class="icon-right" for="Re-Pass">
                                    <i class="fa fa-key"></i>
                                </label>
                                <input required="required" type="password" class="input-right" placeholder="Re-Password" name="txtRePass" value="{!! old('txtRePass') !!}">
                                @if ($errors->has('txtRePass'))
                                    <span class="help-block">
							            {{ $errors->first('txtRePass') }}
						            </span>
                                @endif
                            </div>
                        </div>
                    </li>

                </ul>

                <ul>
                    <li class="cancel">
                        <input type="submit" form="profile-forms" name="submit1" value="Add User"
                               class="b-purple">
                        <input type="button" form="profile-forms" name="" value="Cancel"
                               class="b-purple" onclick="history.go(-1);">
                    </li>
                </ul>
            </div>
        </fieldset>
        <fieldset class="tbFooter">
        </fieldset>


    </form>



@stop