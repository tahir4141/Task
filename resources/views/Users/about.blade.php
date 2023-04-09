@extends('Layout.master')
@section('title')
About
@endsection
@section('section')
<div class="page-header text-center scrap-container">
    <hr size="8">
    <div class="imgdimres"><img src="data:image/jpeg;base64,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" alt="Task " class="img-fluid" >
    </div>
    <div style="margin-left:30px; margin-right:30px; text-align:justify; text-justify:inter-word" >
      <p class="aboutPara"> About Site</p>
      <div class="row " >
        <h1 class="col-sm-12 center aboutHead" style="text-align: center;">What Our Customer Say</h1>
      </div>
      <hr>
      <center>
      <div class="row">
        <div class="row home-tile">
          <div class="col-sm-6 home-title-text">
            <div class="row">
              <h2 class="aboutHead">User1</h2>
              <p class="aboutPara">some feedback dynamic message</p>
            </div>
          </div>
          <div class="col-sm-6 home-tile-graphics">
          </div>
        </div>
        <div class="row home-tile">
          <div class="col-sm-6 home-tile-graphics">
            </div>
          </div>
          <div class="col-sm-6 home-title-text">
            <div class="row">
            <h2 class="aboutHead">User 2</h2>
              <p class="aboutPara">some feedback dynamic message</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </center>
  </div>
</div>
<div class="container clearfix">
    {{-- <br><br> --}}
    <table class="table" >

        <tbody>
            <tr>
                <td>
                <div class="mvv_item">
                  <h3 class="mvv_head aboutHead">Our Mission</h3>

                  <p class="aboutPara">Content goes here</p>
               </div>
           </td>
                <td> <div class="mvv_item">
                  <h3  class="mvv_head aboutHead">Our Values</h3>

                  <p class="aboutPara">Content goes here</p>
               </div></td>
               <td><div class="mvv_item">
                  <h3 class="mvv_head aboutHead">Our Vision</h3>

                  <p class="aboutPara">Content goes here</p>
               </div></td>
            </tr>
        </tbody>

    </table>
</div>
<style>
    .aboutPara{
        color: black;
    }
    .aboutHead{
        color: blue;
    }
</style>

@endsection
