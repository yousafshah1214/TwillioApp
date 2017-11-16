<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Http\Requests\BulkSmsSendRequest;
use App\Message;
use App\Template;
use Illuminate\Http\Request;
use App\PhoneList;
use App\BulkListsUpload;
use Aloha\Twilio\Twilio;
use Illuminate\Support\Facades\Auth;

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
    public function bulkSms(){

      $bulkLists = BulkListsUpload::all();
      $templates = Template::all();

      return view('bulkSmsSendForm')->with('bulkLists',$bulkLists)->with('templates',$templates);
    }

    public function bulkSmsSend(BulkSmsSendRequest $request){
        $template = Template::find($request->get('template'));
        $bulkListUpload = BulkListsUpload::find($request->get('bulkList'));
        $list = $bulkListUpload->phoneList;
        $twilio = new Twilio(env('TWILLIO_ACCOUNT_ID'), env('TWILLIO_TOKEN'),env('TWILLIO_NUMBER') );
        $taskReport = array();

        foreach($list as $phoneNumberObj){

            $phoneNumber = $phoneNumberObj->phone_number;

            $message = $this->createTemplateWithRealData($phoneNumberObj, $template);

            $sent = $twilio->message($phoneNumber, "$message");

            //dump($sent);

            $conversationExists = $phoneNumberObj->conversation()->count();

            if($conversationExists == 1){
                // conversation is already exists
                $this->createMessageWithExistingConversation($message, $phoneNumberObj);
            }
            else{
                // create new conversation
                $this->createConversationWithMessage($phoneNumberObj, $message);
            }

            if(!$sent){
                $taskReport[$phoneNumber] = $sent;
            }
        }

        return redirect()->route('bulk.sms')->with('report',$taskReport);

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

    /**
     * @param $phoneNumberObj
     * @param $template
     * @return string
     */
    protected function createTemplateWithRealData($phoneNumberObj, $template)
    {
        $phoneNumber = $phoneNumberObj->phone_number;

        $firstname = $phoneNumberObj->first_name;

        $lastname = $phoneNumberObj->last_name;

        $address = $phoneNumberObj->address;

        $message = $template->template_body;

        if ($contains = str_contains("$message", "{ firstname }"))
        {
            do {
                $message = str_replace_first('{ firstname }', $firstname, $message);
                $contains = str_contains("$message", "{ firstname }");
            } while ($contains);
        }

        if ($contains = str_contains("$message", "{ lastname }"))
        {
            do {
                $message = str_replace_first('{ lastname }', $lastname, $message);
                $contains = str_contains("$message", "{ lastname }");
            } while ($contains);
        }

        if ($contains = str_contains("$message", "{ address }"))
        {
            do {
                $message = str_replace_first('{ address }', $address, $message);
                $contains = str_contains("$message", "{ address }");
            } while ($contains);
        }

        if ($contains = str_contains("$message", "{ phoneNumber }"))
        {
            do {
                $message = str_replace_first('{ phoneNumber }', $phoneNumber, $message);
                $contains = str_contains("$message", '{ phoneNumber }');
            } while ($contains);
        }

        return $message;
    }

    /**
     * @param $phoneNumberObj
     * @param $message
     */
    protected function createConversationWithMessage($phoneNumberObj, $message)
    {
        $conversation = new Conversation();
        $conversation->user_id = Auth::user()->id;
        $conversation->phone_list_id = $phoneNumberObj->id;

        $conversation->save();

        $messageObj = new Message();
        $messageObj->message_body = $message;
        $messageObj->type = 1;
        $messageObj->conversation_id = $conversation->id;

        $messageObj->save();
    }

    /**
     * @param $message
     * @param $phoneNumberObj
     */
    protected function createMessageWithExistingConversation($message, $phoneNumberObj)
    {
        $messageObj = new Message();
        $messageObj->message_body = $message;
        $messageObj->type = 1;
        $messageObj->conversation_id = $phoneNumberObj->conversation->id;

        $messageObj->save();
    }
}
