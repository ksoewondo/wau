<?php

/**
* A controller that takes care of things after the user is logged in.
*
* @author Kevin Soewondo
* Bug: none known.
*/
namespace App\Http\Controllers;

//Models:
use App\UserProfile;
use App\User;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
    * Show user profile.
    *
    * @return a user profile view
    */
    public function userProfile(Request $request) {
        //need to get user profile from User Profiles Table
        //and display it.

        //get logged in user:
        $user = $request->user();

        return view('directory/user_profile', $this->getArrUserProf($user->email));
    }

    /**
    * Show a view to edit user profile.
    */
    public function showEditProfile() {
        return view('directory/edit_profile');
    }

    /**
    * Edit current user's profile and save it in the database.
    * Then, redirect to user profile view.
    *
    */
    public function editProfile(Request $request) {

        $user = $request->user();

        $profile = UserProfile::where('user_id', $user->id)->first();

        //updating the information:
        $profile->phone_num = $request->get('phoneNum');
        //dob
        $profile->city = $request->get('city');

        $profile->save();

        //should redirect with flash message:
        return redirect('/user-profile')->with('alert-success', 'Profile updated!');
    }

    /**
    * Finding a user in the database by email. Redirects to the user's profile.
    * 
    */
    public function findUser(Request $request) {

        //find user in database by its member ID:
        $user = User::where('email',$request->get('email'))->first();

        //display user's details:
        if (!is_null($user))
            return view('directory/user_profile', $this->getArrUserProf($user->email));
        else
            return view('directory/failed_search');
    }

/******************************************************************************
*
* PRIVATE FUNCTIONS OVER HERE--------------------------------------------------
*
******************************************************************************/


    /**
    * A function to return all user profile data in an array, ready for
    * user_profile.blade to process. 
    *
    * @param $userId id of the user involved.
    * @return an array of user's details
    */
    private function getArrUserProf($email) {
        $user = User::where('email', $email)->first();
        $profile = UserProfile::where('user_id', $user->id)->first();

        return array (
            'userId' => $user->id,
            'fName' => $user->first_name,
            'lName' => $user->last_name,
            'email' => $email,
            'phoneNum' => $profile->phone_num,
            'dob' => $profile->dob,
            'city' => $profile->city,
            'numReviews' => $profile->num_reviews,
            'numFollowers' => $profile->num_followers,
            'numFollowings' => $profile->num_followings,
            'profPLink' => $profile->prof_pic_link);
    }
}
