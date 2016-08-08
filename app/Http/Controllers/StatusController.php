<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Support\Facades\Response;
use Gate;
use Input;
use Session;
class StatusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $status = Status::paginate(10);

        $data = array(
            'Status' => $status,
        );

        return view('status.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        return view('status.add');
    }

    public function create()
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        global $request;
        $status = new Status();
        $status->status = $request->status;
        $status->prev_status = implode(',', $request->prev_status);
        if(count($request->infor))
            $status->infor = implode(',', $request->infor);
        $status->allow_sendmail = $request->get('allow_sendmail') ? $request->get('allow_sendmail'):0;
        $status->email_template = $request->email_template;

        $status->save();
        return redirect()
            ->route('status::getaddstatus')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã thêm trạng thái thành công!'
                ]
            );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $this->validate($request, [
            'status' => 'required|max:255|unique:Status,status',
        ]);

        $status = new Status();
        $status->status = $request->status;
        $status->prev_status = implode(',', $request->prev_status);
        if(count($request->infor))
            $status->infor = implode(',', $request->infor);
        $status->allow_sendmail = $request->get('allow_sendmail') ? $request->get('allow_sendmail'):0;
        $status->email_template = $request->email_template;
        $status->save();

//        Session::flash('flash_message', 'status has been saved.');
        return Response::json($status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
        $status = Status::findorfail($id);
        if (Gate::denies('Admin')) {
            abort(403);
        }
        return view('status.edit')->with('Status', $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }

        $status = Status::findorfail($id);

        if ($status->status != $request->status) {
            $this->validate($request, [
                'status' => 'required|max:255|unique:status',
            ]);
        }
        
        $status->status = $request->status;
        $status->prev_status = implode(',', $request->prev_status);
        if(count($request->infor))
            $status->infor = implode(',', $request->infor);
        else
            $status->infor = null;
        $status->allow_sendmail = $request->get('allow_sendmail') ? $request->get('allow_sendmail'):0;
        $status->email_template = $request->email_template;

        // $status->update($request->all());
        $status->save();
        return redirect()
            ->route('status::list')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã sửa trạng thái thành công'
                ]
            );
        //Session::flash('flash_message', 'status has been updated.');
        //return Response::json($status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Gate::denies('Admin')) {
            abort(403);
        }
        //Status::destroy($id);
        $status = Status::findorfail($id);
        foreach( \App\CV::all() as $cv){
            if( $cv->Status==$id){
                $cv->Status = 1;
                $cv->save();
            }
        }
        $status->delete($id);

//        Session::flash('flash_message', 'status has been deleted.');
        //return Response::json($status);
        return redirect()
            ->route('status::list')
            ->with(
                [
                    'flash_level' => 'success',
                    'message' => 'Đã xóa trạng thái thành công'
                ]
            );
    }
}
