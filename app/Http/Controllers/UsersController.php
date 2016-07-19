<?php

namespace app\Http\Controllers;

use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use App\User;
use Gate;
use Input;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Http\Requests\xUser\addUserRequest;


class UsersController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        $users = User::all();
        $users = User::paginate(10);
        return View::make('xUser.UserIndex')
            ->with('users', $users)
            ->with('count', $users->count());
    }

    /**
     * @param Request $request
     * @return view to Jquery handle
     */
    public function search(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        //use SearchableTrait
        if ($request->has("data-sort")) { //sort
            $user = User::search($request->input('keyword'))
                ->orderBy($request->input('data-field'), $request->input('data-sort'))
                ->get();
        } else {
            $user = User::search($request->input('keyword'))
                ->orderBy('id', 'asc')
                //->take(10)
                ->get();
        }
        //remove admin info
        $user = $user->reject(function ($item) {
            return $item->getRole() == "Admin";
        });
        //partial view
        return View::make('includes.user-index')
            ->with('users', $user)
            ->with('count', $user->count());
    }

    public function store(Request $request)
    {

    }

    /**change user information
     * @param $id
     * @param Request $request
     */
    public function show($id, Request $request)
    {
        $user = User::find($id);
        if (Gate::denies('profile', $id)) {
            abort(403);
        }
        return View::make('xUser.UserEdit')->with('user', $user);
    }

    /**
     * @param $id
     * @param Request $request
     * @return $this
     */
    public function edit($id, Request $request)
    {
        /*if ($request->has('new_password')) {
            $userdata = array(
                'email' => $request->input('email'),
                'password' => $request->input('old_password'));
            $rules = [
                'email' => 'email|max:255',
                'new_password' => 'confirmed|min:4',
                'old_password' => 'min:4',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->except(['old_password']));
            } else {
                if (Auth::attempt($userdata)) {
                    return redirect()->back();//->withInput($userdata);
                }
                $user->password = bcrypt($request->input('new_password'));
            }
        }*/
    }
    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (Gate::denies('profile', $id)) {
            abort(403);
        }
        $rules = [
            'email' => 'email|max:255|unique:users',
            'name' => 'max:255|min:4'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()&&$user->email != $request->input('email')) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $user->image = $name;
            $file->move(public_path().'/img/', $name);
        }
        $user->update($request->except('image'));
        return redirect()->back()->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //add user
    public function getAddUser(){
        return View('xUser.UserAdd');
    }
    public function postAddUser(addUserRequest $request){

        if (Input::hasFile('txtImage')) {
            $extension = $request->file('txtImage')->getClientOriginalExtension();
            $file_name = substr(md5(rand()), 0, 7) . "." . $extension;
            $request->file('txtImage')->move('upload/avatar', $file_name);
        } else {
            $file_name = 'no_image.gif';
        }
        $_user = new User();
        $_user->name = $request->txtName;
        $_user->email = $request->txtEmail;
        $_user->role= $request->rdoLevel;
        $_user->active = 1;
        $_user->password = Hash::make($request->txtPass);
        $_user->image = $request-> $file_name;
        $_user->note = '';

        $_user->save();
        return redirect()
                 ->route('getadduser')
                 ->with(
                     [
                         'flash_level' => 'success',
                         'message' => 'Đã thêm user thành công'
                     ]
                 );
    }
}
