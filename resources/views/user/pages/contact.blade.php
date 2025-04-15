@extends('layouts.user')
@section('content')
<div class="contact">
  <div class="container">
    <!--touch_section start -->
    <div class="touch_section">
        <div class="container">
            <h1 class="touch_text">Let's Get In Touch!</h1>
        </div>
    </div>
    @if(session('error'))
    <div x-data="{open:true}" x-init="setTimeout(()=>open = false , 2000)" style="position: absolute; bottom: 0; right:15px;">
      <div x-show="open" class="alert alert-danger" role="alert">
        <div>
          {{ session('error') }}
        </div>
      </div>
    </div>
    @elseif(session('success'))
    <div x-data="{open:true}" x-init="setTimeout(()=>open = false , 2000)" style="position: absolute; bottom: 0; right:15px;">
      <div x-show="open" class="alert alert-success" role="alert">
        <div>
          {{ session('success') }}
        </div>
      </div>
    </div>
    @endif
    <div class="lets_touch_main">
      <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="input_main">
                <div class="container">
                  <form class="form-message" method="POST" action="{{route('messages.store')}}">
                    @csrf
                      <div class="form-group">
                        <input type="text" class="email-bt @error('name') is-invalid @enderror" placeholder="Name" name="name">
                        @error('name')
                        <p style="color:red; margin:0 15px;">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="text" class="email-bt @error('email') is-invalid @enderror" placeholder="Email" name="email">
                        @error('email')
                        <p style="color:red; margin:0 15px;">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <textarea class="massage-bt @error('body') is-invalid @enderror" placeholder="Massage" rows="5" id="comment" name="body"></textarea>
                        @error('body')
                        <p style="color:red; margin:0 15px;">{{ $message }}</p>
                      @enderror
                      </div>
                      <div class="send_btn">
                        <button type="submit" class="main_bt">Send</button>
                      </div>
                  </form>
                </div> 
              </div>
            </div>
            <div class="col-lg-6">
                <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web</p>
            </div>
          </div>
      </div>
    </div>
  </div>  
</div>
  <!--touch_section end -->
@endsection