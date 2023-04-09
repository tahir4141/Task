@extends('Admin.master')
@section('title')
Companies
@endsection

@section('section')
@include('Company.style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<div class="container">
    <center>
        <h1 class="custom">Companies</h1>
    </center>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('fail') }}
    </div>
    @endif
    <a href="{{ URL::to('/addCompany') }}" class="float-left" style="margin-bottom: 50px"><i
            class="fas fa fa-plus fa-x"></i>Add Company</a>
    <div class="table-responsive">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr style="background: rgb(196, 201, 201);">
                    <th> Logo </th>
                    <th>Reg no</th>
                    <th>Name</th>
                    <th>About</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td><img src="{{ $company['logo'] }}" alt="logo" height="50" width="100"></td>
                    <td>{{ $company['r_no'] }}</td>
                    <td>{{ $company['name'] }}</td>
                    <td>{{ $company['about'] }}</td>
                    <td style="margin-left:5px">
                        <a href="/addPolicy/{{ $company['id'] }}'"><i class="fas fa fa-plus fa-x"
                                style="margin-left: 25px"></i></a>
                        <a href="/updateCompany/{{ $company['id'] }}"><i class="fas fa fa-edit fa-x"
                                style="margin-left: 25px"></i></a>
                        <a href="/showPolicies/{{ $company['id'] }}"><i class="fa fa-eye" aria-hidden="true"
                                style="margin-left: 25px"></i></a>
                        <a href="/deleteCompany/{{ $company['id']}}"><i class="fa fa-trash"
                                style="margin-left: 25px"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
$('#example').DataTable();
} );
</script>

@endsection
