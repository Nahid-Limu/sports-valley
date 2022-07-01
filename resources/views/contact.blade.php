@extends('layouts.app')
@section('title', 'Contact Us')
@section('css')
@endsection
@section('content')

    <div class="breadcrumbs bg-warning">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Contact Us</span></p>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('message'))
    <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong> {{ Session::get('message') }} </strong>
    </div>
    @endif

    <div id="colorlib-contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Contact Information</h3>
                    <div class="row contact-info-wrap">
                        <div class="col-md-3">
                            <p><span><i class="icon-location"></i></span> Cinema Hall Road, <br>Hazi Ibrahim Market, Panchagarh</p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 88 01625836160</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com"> info@sportsvalley.in</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-globe"></i></span> <a href="http://sportsvalley.in"> sportsvalley.in</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-wrap">
                        <h3>Get In Touch</h3>
                        <form action="{{ route('sendmail') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" id="fname" name="fname" required class="form-control" placeholder="Your firstname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" id="lname"  name="lname" required class="form-control" placeholder="Your lastname">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Your email address">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="submit" value="Send Message" class="btn btn-primary" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>		
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="map" class="colorlib-map"></div>		
                </div>
            </div>
        </div>
    </div>

    


@endsection
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5jTQHNFbHA79AOeBfVgt0ul4GfHIeTlE&callback=initMap&libraries=&v=weekly&channel=2"
async
>
</script>
<script>
    // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: 26.335376, lng: 88.551698 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
</script>