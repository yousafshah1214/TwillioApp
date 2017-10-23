<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\Http\Requests\TemplateCreateRequest;
use App\Http\Requests\TemplateEditRequest;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $templates = Template::paginate(10);

        return view('templateList')->with('templates',$templates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('templateCreateForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateCreateRequest $request)
    {
        //
        $template = new Template();
        $template->template_name =  $request->get('name');
        $template->template_body =  $request->get('template');
        $template->user_id       =  rand(1,50); //Auth::user()->id;

        $template->save();

        return redirect('templates');

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
        $template = Template::find($id);

        return view('templateEditForm')->with('template',$template);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $template = Template::find($id);
        $template->template_name =  $request->get('name');
        $template->template_body =  $request->get('template');
        $template->user_id       =  rand(1,50); //Auth::user()->id;

        $template->save();

        return redirect('templates');
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
        $template = Template::find($id);

        $template->delete();

        return redirect('templates');
    }
}
