@extends('layouts.app')

<!-- A layout to update profile -->
@section ('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit My Profile</div>

                <div class="panel-body">

        					<h2>{{Auth::user()->first_name .' ' . Auth::user()->last_name}}</h2>

        					<form method="POST" action="{{url('edit-profile')}}">
                  {!! csrf_field() !!}

                  <label for="phoneNum">Phone Number: </label>
                  <input type="text" name="phoneNum" class="form-control" id="phoneNum" placeholder="Not specified"/><br/>

                  <label for="dob">Date of Birth: (not yet done)</label>
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="Not specified"/><br/>

                  <label for="city">City: </label>
                  <input type="text" name="city" class="form-control" id="city" placeholder="Not specified"/><br/>

                  <button type="submit" class="btn btn-primary">Update Profile</button>
				        </div>
			      </div> <!-- for top panel -->
        </div>
    </div>
</div>

@endsection