@extends('layouts.app')

<!-- A layout to see user details without the ability to edit users -->
@section ('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body">
                	<div class="flash-message">
    					@foreach (['danger', 'success'] as $msg)
      						@if(Session::has('alert-' . $msg))

      						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} </p>
      						@endif
    					@endforeach
  					</div> <!-- end .flash-message -->

					<h2>{{$fName .' ' . $lName}}</h2>
					<ul class="list-unstyled">
						<li>should display profile pic here!</li>
						<li><strong>Registered Email:</strong>{{$email}}</li>
						<li><strong>Member ID: </strong>{{$userId}}</li>
						<li><strong>Phone Number: </strong>{{$phoneNum}}</li>
						<li><strong>Date of Birth: </strong>{{$dob}}</li>
						<li><strong>City: </strong>{{$city}}</li>
						<li><strong>Reviews: </strong>{{$numReviews}}</li>
						<li><strong>Followers: </strong>{{$numFollowers}}</li>
						<li><strong>Followings: </strong>{{$numFollowings}}</li>
					</ul>
					<br/>
					<a href="{{url('/edit-profile')}}">Edit Profile</a>
				</div>
			</div> <!-- for top panel -->

			<div class="panel panel-default">
                <div class="panel-heading">My Reviews</div>

                <div class="panel-body">
                	<h2>Reviews</h2>
				</div>
			</div>

			<div class="panel panel-default">
                <div class="panel-heading">My Photos</div>

                <div class="panel-body">
                	<h2>Photos</h2>
				</div>
			</div>

        </div>
    </div>
</div>

@endsection