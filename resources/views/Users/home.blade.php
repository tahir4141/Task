@extends('Layout.master')
@section('title')
    Home
@endsection
@section('section')
    <a href="{{ url('item-Category1') }}">
        <div class="feature-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7cgVMRobBZPwLCTafG1UwbT1R4eb38llRwg&usqp=CAU" alt="">
            <h2>Category1</h2>
        </div>
    </a>

    <a href="{{ url('item-Category2') }}">
        <div class="feature-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7cgVMRobBZPwLCTafG1UwbT1R4eb38llRwg&usqp=CAU" alt="">
            <h2>Category 2</h2>

        </div>
    </a>

    <a href="{{ url('item-Category3') }}">
        <div class="feature-container">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7cgVMRobBZPwLCTafG1UwbT1R4eb38llRwg&usqp=CAU" alt="">
            <h2>Category 3</h2>

        </div>

    </a>

    <a href="{{ url('item-Category4') }}">

        <div class="feature-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7cgVMRobBZPwLCTafG1UwbT1R4eb38llRwg&usqp=CAU" alt="">

            <h2>Category  4</h2>

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
