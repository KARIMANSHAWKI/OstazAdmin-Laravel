<div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
    <div id="chatBox">
        <div class="conversation-start">
            @if (isset($messages))
            @foreach ($messages as $message)
            <div class="bubble {{ ($message->from == Auth::guard('admin')->user()->id) ? 'me' : 'you'}}">
                {{$message->message}}
                <span>{{date('d M y, h:i', strtotime($message->created_at))}}</span>
               </div>
           @endforeach
            @endif
        </div>

    </div>

</div>




