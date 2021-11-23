<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin LogIn</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('img').'/'.'title-logo.png' }}" />

  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
  @if ($errors->any())
      @foreach ($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{ $error }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endforeach
  @endif
    @if(Session::has('message'))
    <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong> {{ Session::get('message') }} </strong>
    </div>
    @endif
<div class="login-page">  
<div class="panda">
  <div class="ear"></div>
  <div class="face">
    <div class="eye-shade"></div>
    <div class="eye-white">
      <div class="eye-ball"></div>
    </div>
    <div class="eye-shade rgt"></div>
    <div class="eye-white rgt">
      <div class="eye-ball"></div>
    </div>
    <div class="nose"></div>
    <div class="mouth"></div>
  </div>
  <div class="body"> </div>
  <div class="foot">
    <div class="finger"></div>
  </div>
  <div class="foot rgt">
    <div class="finger"></div>
  </div>
</div>
<form method="POST" action="{{ route('login') }}" class="login-form">
    @csrf
  <div class="hand"></div>
  <div class="hand rgt"></div>
  <h1>Admin Login</h1>
  <div class="form-group">
    <input class="form-control" type="email" name="email" required="required"/>
    <label class="form-label">Email</label>
  </div>
  <div class="form-group">
    <input class="form-control" type="password" name="password" id="password" required="required" />
    <label class="form-label">Password</label>
    <p class="alert">Invalid Credentials..!!</p>
    <button class="btn">Login </button>
  </div>
</form>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
  $('#password').focusin(function(){
  $('form').addClass('up')
});
$('#password').focusout(function(){
  $('form').removeClass('up')
});

// Panda Eye move
$(document).on( "mousemove", function( event ) {
  var dw = $(document).width() / 15;
  var dh = $(document).height() / 15;
  var x = event.pageX/ dw;
  var y = event.pageY/ dh;
  $('.eye-ball').css({
    width : x,
    height : y
  });
});

// validation


// $('.btn').click(function(){
//   $('form').addClass('wrong-entry');
//     setTimeout(function(){ 
//        $('form').removeClass('wrong-entry');
//      },3000 );
// });


//flash msg
$("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
  $("#successMessage").alert('close');
});

</script>
</body>
</html>