@extends('layouts.app')
@section('title', 'PBC Event Registration')
@section('css')
@endsection
@section('content')

    <div class="breadcrumbs bg-warning">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Event Registration</span></p>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('message'))
    <div id="successMessage" class="alert alert-dismissible alert-success text-center" style="display: inline-block;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong> {{ Session::get('message') }} </strong>
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="colorlib-contact">
        <div class="container">
            {{-- <div class="row">
                <div class="col-sm-12">
                    <h3>Contact Information pbc</h3>
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
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-wrap">
                        <img class="displayed" src="{{ asset('system_img').'/'.'pbcLogo.png' }}"  alt="">
                        <hr>
                        <h3 class="text-center">TEAM Registration</h3>
                        <hr>
                        <form action="{{ route('pbceventreg') }}" method="POST" enctype="multipart/form-data" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-success" for="teamNem">Team Name</label>
                                        <input type="text" id="teamNem" name="teamName" required class="form-control" >
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-success" for="teamManagerName">Team Manager Name</label>
                                        <input type="text" id="teamManagerName"  name="teamManagerName" required class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-success" for="phone">Phone No</label>
                                        <input type="tel" id="phone" name="phone" required class="form-control" >
                                    </div>
                                </div>
                                <div class="w-100"></div>

                                <div class="col-md-5 border border-danger" style="margin-left: 20px;">
                                    <h5 class="text-center font-weight-bold"><u>PLAYER 1 DETAILS</u></h5>
                                    <div class="form-group">
                                        <label class="text-success" for="p1name">Name:</label>
                                        <input type="text" id="p1name" name="p1name" required class="form-control" >
                                        
                                        <label class="text-success" for="p1nid">National ID No:</label>
                                        <input type="number" id="p1nid" name="p1nid" required class="form-control" >
                                        
                                        <label class="text-success" for="p1dob">Birth Date:</label>
                                        <input type="date" id="p1dob" name="p1dob" required class="form-control" >
                                        
                                        <label class="text-success" for="p1city">City:</label>
                                        <input type="text" id="p1city" name="p1city" required class="form-control" >
                                        
                                        <label class="text-success" for="p1district">District:</label>
                                        <input type="text" id="p1district" name="p1district" required class="form-control" >
                                        
                                        <label class="text-success" for="p1post">Post:</label>
                                        <input type="text" id="p1post" name="p1post" required class="form-control" >

                                        <label class="text-success" for="p1village">Village:</label>
                                        <input type="text" id="p1village" name="p1village" required class="form-control" >

                                        <label class="text-success" for="p1image">Photo:</label>
                                        <input type="file" id="p1image" name="p1image" required class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    
                                </div>
                                <div class="col-md-5 border border-success">
                                    <h5 class="text-center font-weight-bold"><u>PLAYER 2 DETAILS</u></h5>
                                    <div class="form-group">
                                        <label class="text-success" for="p2name">Name:</label>
                                        <input type="text" id="p2name" name="p2name" required class="form-control" >
                                        
                                        <label class="text-success" for="p2nid">National ID No:</label>
                                        <input type="number" id="p2nid" name="p2nid" required class="form-control" >
                                        
                                        <label class="text-success" for="p2dob">Birth Date:</label>
                                        <input type="date" id="p2dob" name="p2dob" required class="form-control" >
                                        
                                        <label class="text-success" for="p2city">City:</label>
                                        <input type="text" id="p2city" name="p2city" required class="form-control" >
                                        
                                        <label class="text-success" for="p2district">District:</label>
                                        <input type="text" id="p2district" name="p2district" required class="form-control" >
                                        
                                        <label class="text-success" for="p2post">Post:</label>
                                        <input type="text" id="p2post" name="p2post" required class="form-control" >

                                        <label class="text-success" for="p2village">Village:</label>
                                        <input type="text" id="p2village" name="p2village" required class="form-control" >

                                        <label class="text-success" for="p2image">Photo:</label>
                                        <input type="file" id="p2image" name="p2image" required class="form-control" >
                                    </div>
                                </div>

                                <div class="w-100"></div>
                                
                                <div class="col-sm-12">
                                    <br>
                                    <div class="form-group">
                                        <hr>
                                        <h5 class="text-success text-center" for="email">TEAM LOCATION</h5>
                                        <label class="radio-inline" style="margin-right: 60px;">
                                            <input type="radio" name="teamLocation"  value="PANCHAGARH SADAR" checked> PANCHAGARH SADAR
                                        </label>
                                        <label class="radio-inline" style="margin-right: 60px;">
                                            <input type="radio" name="teamLocation"  value="BODA"> BODA
                                        </label>
                                        <label class="radio-inline" style="margin-right: 60px;">
                                            <input type="radio" name="teamLocation"  value="DEBIGANJ"> DEBIGANJ
                                        </label>
                                        <label class="radio-inline" style="margin-right: 60px;">
                                            <input type="radio" name="teamLocation"  value="OUTSITE OF PANCHAGARH SADAR"> OUTSITE OF PANCHAGARH SADAR
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <br>
                                    <div class="form-group">
                                        <hr>
                                        <h5 class="text-success text-center" for="email">SELECT CATEGORY</h5>
                                        
                                        <div class="form-check" style="margin-left: 30px;">
                                            <input class="form-check-input" type="radio" name="category" id="category" value="A CATEGORY" checked>
                                            <label class="form-check-label" for="category">
                                                A CATEGORY ( AGE: 1-20)
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin-left: 30px;">
                                            <input class="form-check-input" type="radio" name="category" id="category" value="B CATEGORY" >
                                            <label class="form-check-label" for="category">
                                                B CATEGORY ( AGE: 20-30)
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin-left: 30px;">
                                            <input class="form-check-input" type="radio" name="category" id="category" value="C CATEGORY" >
                                            <label class="form-check-label" for="category">
                                                C CATEGORY ( AGE: 30-40)
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin-left: 30px;">
                                            <input class="form-check-input" type="radio" name="category" id="category" value="D CATEGORY" >
                                            <label class="form-check-label" for="category">
                                                D CATEGORY ( AGE:40-100)
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin-left: 30px;">
                                            <input class="form-check-input" type="radio" name="category" id="category" value="E CATEGORY" >
                                            <label class="form-check-label" for="category">
                                                RANDOM
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                
                                
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <hr>
                                        <h5 class="text-danger text-center">RULES & REGULATION</h5>
                                        <ol>
                                            <li>Outsite Of Panchagarh District Not Allow.</li>
                                            <li>One Player Must Pair With Another Player From Same City/Upozila.</li>
                                            <li>A game starts with a coin toss. Whoever wins the toss gets 
                                                to decide whether they would serve or receive first OR what 
                                                side of the court they want to be on. The side losing the toss 
                                                shall then exercise the remaining choice.</li>
                                            <li>A Match Consiste Of The Best Of 3 games 21 Points.</li>
                                        </ol>
                                        
                                        <strong>Note: In Order To Partipate In This Event All Participants Must Be 
                                            Registered On sportsvalley.in Please go www.sportsvalley.in to register</strong>

                                        <div style="width: 100%;">
                                            <div style="width: 50%; height: 100px; float: left;"> 
                                                <b>Arranged by:</b>
                                                <br>
                                                <i>Panchagarh Sports Agency</i>
                                            </div>
                                            <hr>
                                            <div style="margin-left: 50%; height: 100px"  class="text-right"> 
                                                <b>Organised by:</b>
                                                <br>
                                                <i>Sports Valley</i>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group text-right">
                                        <input type="submit" value="Registration" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>		
                    </div>
                </div>
            </div>
        </div>
    </div>

    


@endsection
@section('script')
    <script>
            //text eiditior
            //tinymce.init({selector: 'textarea'});

            //flash msg
            $("#successMessage").fadeTo(1000, 500).slideUp(500, function(){
                $("#successMessage").alert('close');
            });
    </script>
@endsection
