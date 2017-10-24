<?php

namespace App\Http\Controllers;

require_once base_path('/vendor/autoload.php');

use Illuminate\Http\Request;
use App\PhoneList;
use Twilio\Twiml;

class SmsController extends Controller
{
    //
    public function reply(Request $request){
      if (isset($request)){
        echo 'request receive';
      }
        $phoneList = new PhoneList();
        $phoneList->first_name = 'faker 1';
        $phoneList->last_name = 'lastname faker';
        $phoneList->address = "address fake hy";
        $phoneList->phone_number = $request->get('From');
        $phoneList->bulk_lists_upload_id = rand(1,20);
        $phoneList->state_id = rand(1,20);

        if($phoneList->save()){
           echo "saved";
        }
        else {
          echo "not saved";
        }
    }
}
