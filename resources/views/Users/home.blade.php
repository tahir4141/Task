@extends('Layout.master')
@section('title')
    Home
@endsection
@section('section')
    <a href="{{ url('Sports') }}">
        <div class="feature-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7cgVMRobBZPwLCTafG1UwbT1R4eb38llRwg&usqp=CAU" alt="">
            <h2>Sports</h2>
        </div>
    </a>

    <a href="{{ url('Electronic') }}">
        <div class="feature-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7cgVMRobBZPwLCTafG1UwbT1R4eb38llRwg&usqp=CAU" alt="">
            <h2>Electronic</h2>

        </div>
    </a>

    <a href="{{ url('Assessiries') }}">
        <div class="feature-container">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7cgVMRobBZPwLCTafG1UwbT1R4eb38llRwg&usqp=CAU" alt="">
            <h2>Assessiries</h2>

        </div>

    </a>

    <a href="{{ url('Other') }}">

        <div class="feature-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7cgVMRobBZPwLCTafG1UwbT1R4eb38llRwg&usqp=CAU" alt="">

            <h2>Other</h2>

        </div>
    </a>
    <style>
        .feature-container {
            margin-left: 20px;
            margin-right: 20px;
            min-width: 100px;
            max-width: 250px;
        }

    </style>
@endsection
