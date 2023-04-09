@extends('Layout.master')
@section('title')
    Contact
@endsection

@section('section')
    <div class="container contact card center" style="text-align: center; element.style text-align: center;
        margin-top: 30px;
        padding-top: 15px;
        padding-bottom: 15px;
        background: rgba(255,0,0,0.10);  /* 50% transparent */  ">


        <!--Google map-->
        <div id="map-container-google-1" class="z-depth-1-half map-container">
            <iframe src="https://maps.google.com/maps?q=Bangalure&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border:0; width:100%;" allowfullscreen></iframe>
        </div>

        <!--Google Maps-->
        <h1 class="center ">CONTACT US</h1>
        <h1>Name:</h1>
        <p>Tahir Ahmad</p>

        <h1>Mail Us:</h1>
        <p>ahmad.tahir4141@gmail.com </p>
        <h1 class="center">Give Us a Call:</h1>
        <p class="center">+91-9008027716</p>
    </div>
@endsection
