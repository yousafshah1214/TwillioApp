<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\PhoneList;
use App\State;
use App\BulkListsUpload;
use App\Http\Requests\ImportCsvRequest;

class CsvImportController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('importCsv');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImportCsvRequest $request)
    {

      if($request->file('csvFile'))
      {
                $path = $request->file('csvFile')->getRealPath();
                $data = Excel::load($path, function($reader){
                  
                })->get();

            if(!empty($data) && $data->count())
            {
                $bulkList = new BulkListsUpload;
                $bulkList->bulk_list_name = $request->get('listName');
                $bulkList->number_of_records = $data->count();
                $bulkList->user_id = rand(1,50); //Auth::id();

                $bulkList->save();

                foreach($data->toArray() as $row){
                  $phoneList = new PhoneList;

                  $phoneList->first_name = $row['firstname'];
                  $phoneList->last_name  =  $row['lastname'];
                  $phoneList->phone_number = $row['phonenumber'];

                  $phoneList->state_id = State::find(rand(1,20))->id;
                  // if(State::findOrFail($row['state_code']) !=  null){
                  //   $phoneList->state_id = State::find($row['state_code'])->id;
                  // }
                  // else{
                  //   $phoneList->state_id = 1;
                  // }
                  $phoneList->address = $row['address'];
                  $phoneList->bulk_lists_upload_id = $bulkList->id;

                  $phoneList->save();

                }
            }
        }

        return back();

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
