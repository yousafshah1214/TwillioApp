@extends('layouts.layout')

@section('style')
  <style>
  #custom-search-input {
background: #e8e6e7 none repeat scroll 0 0;
margin: 0;
padding: 10px;
}
#custom-search-input .search-query {
background: #fff none repeat scroll 0 0 !important;
border-radius: 4px;
height: 33px;
margin-bottom: 0;
padding-left: 7px;
padding-right: 7px;
}
#custom-search-input button {
background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
border: 0 none;
border-radius: 3px;
color: #666666;
left: auto;
margin-bottom: 0;
margin-top: 7px;
padding: 2px 5px;
position: absolute;
right: 0;
z-index: 9999;
}
.search-query:focus + button {
z-index: 3;
}
.all_conversation button {
background: #f5f3f3 none repeat scroll 0 0;
border: 1px solid #dddddd;
height: 38px;
text-align: left;
width: 100%;
}
.all_conversation i {
background: #e9e7e8 none repeat scroll 0 0;
border-radius: 100px;
color: #636363;
font-size: 17px;
height: 30px;
line-height: 30px;
text-align: center;
width: 30px;
}
.all_conversation .caret {
bottom: 0;
margin: auto;
position: absolute;
right: 15px;
top: 0;
}
.all_conversation .dropdown-menu {
background: #f5f3f3 none repeat scroll 0 0;
border-radius: 0;
margin-top: 0;
padding: 0;
width: 100%;
}
.all_conversation ul li {
border-bottom: 1px solid #dddddd;
line-height: normal;
width: 100%;
}
.all_conversation ul li a:hover {
background: #dddddd none repeat scroll 0 0;
color:#333;
}
.all_conversation ul li a {
color: #333;
line-height: 30px;
padding: 3px 20px;
}
.member_list .chat-body {
margin-left: 47px;
margin-top: 0;
}
.top_nav {
overflow: visible;
}
.member_list .contact_sec {
margin-top: 3px;
}
.member_list li {
padding: 6px;
}
.member_list ul {
border: 1px solid #dddddd;
}
.chat-img img {
height: 34px;
width: 34px;
}
.member_list li {
border-bottom: 1px solid #dddddd;
padding: 6px;
}
.member_list li:last-child {
border-bottom:none;
}
.member_list {
height: 380px;
overflow-x: hidden;
overflow-y: auto;
}
.sub_menu_ {
background: #e8e6e7 none repeat scroll 0 0;
left: 100%;
max-width: 233px;
position: absolute;
width: 100%;
}
.sub_menu_ {
background: #f5f3f3 none repeat scroll 0 0;
border: 1px solid rgba(0, 0, 0, 0.15);
display: none;
left: 100%;
margin-left: 0;
max-width: 233px;
position: absolute;
top: 0;
width: 100%;
}
.all_conversation ul li:hover .sub_menu_ {
display: block;
}
.new_message_head button {
background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
border: medium none;
}
.new_message_head {
background: #f5f3f3 none repeat scroll 0 0;
float: left;
font-size: 13px;
font-weight: 600;
padding: 18px 10px;
width: 100%;
}
.message_section {
border: 1px solid #dddddd;
}
.chat_area {
float: left;
height: 300px;
overflow-x: hidden;
overflow-y: auto;
width: 100%;
}
.chat_area li {
padding: 14px 14px 0;
}
.chat_area li .chat-img1 img {
height: 40px;
width: 40px;
}
.chat_area .chat-body1 {
margin-left: 50px;
}
.chat-body1 p {
background: #fbf9fa none repeat scroll 0 0;
padding: 10px;
}
.chat_area .admin_chat .chat-body1 {
margin-left: 0;
margin-right: 50px;
}
.chat_area li:last-child {
padding-bottom: 10px;
}
.message_write {
background: #f5f3f3 none repeat scroll 0 0;
float: left;
padding: 15px;
width: 100%;
}

.message_write textarea.form-control {
height: 70px;
padding: 10px;
}
.chat_bottom {
float: left;
margin-top: 13px;
width: 100%;
}
.upload_btn {
color: #777777;
}
.sub_menu_ > li a, .sub_menu_ > li {
float: left;
width:100%;
}
.member_list li:hover {
background: #428bca none repeat scroll 0 0;
color: #fff;
cursor:pointer;
}
.active > .text-muted{
  color:white !important;
}
.active > .d-flex > small{
  color:white !important;
}
  </style>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.dashboard') }}">Dashboard</a>
          </li>
        </ul>

      </nav>

      <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>conversations</h1>

        <h2>All conversations</h2>

        <div class="row">

          <!--- start-->

          <div class="col">
              <button id="load-more" type="button" class="btn btn-primary btn-lg btn-block">Load Previous Chat</button>
              <br>
            <div class="list-group">
                <?php $chunk = 0 ?>
            @foreach($conversation->messages as $message)
                @if($chunk == 0)
                    <nav class="navbar navbar-light bg-light">
                        <span class="navbar-text">
                            Chat Started on {{ $message->created_at->toDayDateTimeString() }}
                        </span>
                    </nav>
                @endif
                <div id="{{ ++$chunk }}" class="chunk" style="display: none">
                  <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{ $message->conversation->phoneList->phone_number }}</h5>
                      <small>{{ $message->created_at->toDayDateTimeString() }}</small>
                    </div>
                    <p class="mb-1">{{ $message->message_body }}</p>
                    <small>Sent by {{ $message->conversation->user->username }}</small>
                  </div>
                  @if($message->replies()->count() > 0)
                    @foreach($message->replies as $reply)
                      <div class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">{{ $reply->conversation->phoneList->phone_number }}</h5>
                          <small class="text-muted">{{ $reply->created_at->toDayDateTimeString() }}</small>
                        </div>
                        <p class="mb-1">{{ $reply->body }}</p>
                        <small class="text-muted">{{ $reply->conversation->user->username }}</small>
                      </div>
                    @endforeach
                  @endif
                </div>
            @endforeach

              <div class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Logged In user : {{ Auth::user()->username }}</h5>
                  <small class="text-muted">{{ \Carbon\Carbon::now()->toDayDateTimeString() }}</small>
                </div>
                {!! Form::open([ 'route' => 'user.sms.send' ]) !!}
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="send_to" value="{{ $message->conversation->phoneList->phone_number }}">
                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                <br>
                <button type="submit" class="btn btn-success">Send Reply</button>
                {!! Form::close() !!}
                {{-- <textarea class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</textarea> --}}
                <small class="text-muted"> to {{ $message->conversation->phoneList->phone_number }}</small>
              </div>
            </div>

          </div>

          <!--- OFF-->

        </div>
      </main>
    </div>

  </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var clicks = 0;
            var max = 0;

            $('.chunk').each(function() {
                max = Math.max(this.id, max);
            });

            $("#"+max).show();

            $("#load-more").click(function(){
                clicks = clicks+1;
                $("#"+(max-clicks)).show();
            });
        });
    </script>
@endSection
