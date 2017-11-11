<?php

namespace App\Http\Controllers;

require_once base_path('/vendor/autoload.php');

use Aloha\Twilio\Twilio;
use App\Conversation;
use App\Message;
use App\Reply;
use Exception;
use Illuminate\Http\Request;
use App\PhoneList;

class SmsController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
    //
    public function reply(Request $request){
      $from = $request->get('From');
      if (isset($from)){
          $numberExists = PhoneList::where('phone_number',$from)->count();
          if($numberExists == 1){
                // Number Exists in Phone List
              $phoneList = PhoneList::where('phone_number',$from)->first();
              $conversationExist = Conversation::where('conversations_phone_list_id',$phoneList->id)->count();
              if($conversationExist == 1){
                  // Conversation Exists
                  $conversation = Conversation::where('conversations_phone_list_id',$phoneList->id)->first();
                  $message = Message::where('conversation_id',$conversation->id)->latest()->first();
                  $reply = new Reply();
                  $reply->body = $request->get('body');
                  $reply->message_id = $message->id;
                  $reply->conversation_id = $conversation->id;

                  $reply->save();

                  // save reply with body and corresponding message id.
              }
              else{
                  throw new Exception("Issues with System");
              }
          }
          else{
              throw new Exception("Issues with System");
          }
      }
      else{
        throw new Exception("Issues with System");
      }

//        $phoneList = new PhoneList();
//        $phoneList->first_name = 'faker 1';
//        $phoneList->last_name = 'lastname faker';
//        $phoneList->address = "address fake hy";
//        $phoneList->phone_number = $request->get('From');
//        $phoneList->bulk_lists_upload_id = rand(1,20);
//        $phoneList->state_id = rand(1,20);

//        if($phoneList->save()){
//           echo "saved";
//        }
//        else {
//          echo "not saved";
//        }
    }

    public function send(Request $request){
        // conversation already existed

        $message = $request->get('message');

        $phoneNumber = $request->get('send_to');

        $twilio = new Twilio(env('TWILLIO_ACCOUNT_ID'), env('TWILLIO_TOKEN'),env('TWILLIO_NUMBER') );

        $phone = PhoneList::where('phone_number',$phoneNumber)->first();

        $sent = $twilio->message($phone->phone_number,$message);

        $messageObj = new Message();
        $messageObj->message_body = $message;
        $messageObj->type = 1;
        $messageObj->conversation_id = $phone->conversation->id;

        $messageObj->save();

//        dump($sent);

        return redirect()->back();
    }
}
