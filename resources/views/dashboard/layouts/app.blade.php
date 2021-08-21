<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> Ostaz </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/ltr/assets/img/favicon.ico') }}" />

    @include('dashboard.shared.styles.ltr.general')
    @toastr_css


</head>

<body class="alt-menu sidebar-noneoverflow">

    @include('dashboard.shared.header')

    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        @include('dashboard.shared.sidebar')

        <div id="content" class="main-content">
            @yield('content')
        </div>
    </div>

    @include('dashboard.shared.scripts.general')
    @include('dashboard.shared.scripts.trainer')
    @include('dashboard.shared.scripts.student')
    @include('dashboard.shared.scripts.country')
    @include('dashboard.shared.scripts.program')
    @include('dashboard.shared.scripts.category')
    @include('dashboard.shared.scripts.permission')
    @include('dashboard.shared.scripts.supervisor')
    @include('dashboard.shared.scripts.toastr')





    <script>
        $(document).ready(function() {
            $('.multiSelect').selectpicker({
                size: '10'
            });
        })



    </script>

@toastr_js
@toastr_render


@if(Session::has('message'))
<script type="text/javascript">
  toastr.info("{!!Session::get('message')!!}")
</script>
@endif
<script src="{{asset('dashboard/ltr/assets/js/apps/mailbox-chat.js')}}"></script>
<script>
    var receiverId = '';
    var meId ="{{ Auth::guard('admin')->user()->id}}";
    $(document).ready(function(){

        // ##### AJAX SETUP ###
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ###### GET RECEVIER ID #####
        $('.userMessage').click(function(){
            receiverId = $(this).attr('id');
            $.ajax({
                type:"get",
                url : "message/" + receiverId,
                data:"",
                cache:false,
                success:function(data){
                    $(".chat-conversation-box").html(data);


                }
            })
        });

        // ######## SEND MESSAGE #######
        $(document).on('keyup', '.mail-write-box', function(e){
                var message = $(this).val();

                if(e.which == 13 && message != '' && receiverId != ''){
                    $(this).val('');
                    var datastr = "receiver_id=" + receiverId + "&message=" + message;
                    $.ajax({
                        type: "post",
                        url: "message",
                        data: datastr,
                        cache: false,
                        success: function (data) {
                        },
                        error: function (jqXHR, status, err) {
                        },
                        complete: function () {

                        }
                })

                }
        });

          // ##### ENABLE PUSHER ####
          Pusher.logToConsole = true;

          var pusher = new Pusher('ceb7c2853aea9c763f26',{
              encrypted: true
          });

          var channel = pusher.subscribe('my-channel');
          channel.bind('App\\Events\\Chat', function(data) {
              alert(JSON.stringify(data));
            if (meId == data.from) {
                $('#' + data.to).click();
            }else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());
                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }

          });

    });


</script>
</body>

</html>
