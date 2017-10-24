<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\User;
use App\Http\Requests\StateCreateRequest;
use App\Http\Requests\StateEditRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $states = State::paginate(10);
        return view('stateList')->with('states',$states);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('stateCreateForm')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateCreateRequest $request)
    {
        //
        $state = new State();
        $state->state_name = $request->get('stateName');
        $state->state_code = $request->get('stateCode');
        $state->area_code = $request->get('areaCode');
        $state->user_id = User::find($request->get('user'))->id;
        $state->country = $request->get('country');
        $state->save();

        return redirect('states');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $state = State::find($id);

        $users = User::all();

        return view('stateEditForm')->with('state',$state)->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateEditRequest $request, $id)
    {
        //
        $state = State::find($id);

        $state->state_name = $request->get('stateName');
        $state->state_code = $request->get('stateCode');
        $state->area_code = $request->get('areaCode');
        $state->user_id = User::find($request->get('user'))->id;
        $state->country = $request->get('country');
        $state->save();

        return redirect('states');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $state = State::find($id);

        $state->delete();

        return redirect('states');
    }
}
