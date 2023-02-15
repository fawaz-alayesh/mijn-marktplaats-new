@extends('layouts.app')

@section('content')

<div class="container mt-3 pd-3">

    <h2>Ajax Live Search Page</h2>
    <hr>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="input-group">
                <input type="search" id="search" name="search" class="form-control rounded" placeholder="Search" />
                <button type="button" class="btn btn-outline-primary">search</button>
            </div>
        </div>

        <div class="col-md-8">
            <div id="Content" class="card mycard m-2 p-2" style="width: 18rem;">

            </div>
        </div>
    </div>

</div>


     
@endsection