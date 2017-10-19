<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhoneList;
use App\BulkListsUpload;
use Aloha\Twilio\Twilio;

class BulkSMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lists = BulkListsUpload::paginate(15);

      return view('bulksms')->with('lists' , $lists);
    }

    /**
    * Show page for sending bulk sms to specified lists
    *
    * @return \Illuminate\Http\Response
    */
    public function bulksms(){

      $bulkLists = BulkListsUpload::all();

      $twilio = new Twilio('ACa823f91cc70e7b84006550bd4a2483ce', 'ecd4c57d57c567809becd09274fac578','+18643622744' );

      $twilio->message('+923327226010', 'Pink Elephants and Happy Rainbows');

      return view('bulkSmsSendForm')->with('bulkLists',$bulkLists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
