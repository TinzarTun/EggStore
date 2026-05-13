<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // get create
    public function getCreate(){
        return view("admin.user.create");
    }

    // post create
    public function postCreate(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:30',
            'email' => 'required|email:rfc,dns|max:50|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|digits_between:1,15',
            'gender' => 'required',
            'city' => 'required',
            'location' => 'required',
            'address' => 'required|string|max:255',
            'terms' => 'accepted',
        ], [
            'image.required' => 'An image is required',
            'image.image' => 'The uploaded file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2048 kilobytes',
            'name.required'=> 'Your name is required',
            'name.max' => 'Name must not exceed 30 characters',
            'email.required'=> 'Your email is required',
            'email.unique' => 'This email is already taken',
            'email.email' => 'Please provide a valid email address',
            'password.required'=> 'Your password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.confirmed' => 'Password confirmation does not match',
            'phone.required'=> 'Your phone number is required',
            'phone.max' => 'Phone number must not exceed 15 characters',
            'phone.digits_between' => 'Phone number must contain only digits and maximum 15 digits',
            'gender.required'=> 'Your gender is required',
            'city.required'=> 'Your city is required',
            'location.required'=> 'Your location is required',
            'address.required'=> 'Your address is required',
            'address.max' => 'Address must not exceed 255 characters',
            'terms.accepted' => 'You must agree to the Terms and Conditions',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // dd($request->all());
        $data=$this->getUserData($request);
        // dd($data);

        // image handle
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile', 'public');
            $data['image'] = $path;
        }

        // MVC framework = Model, View, Controller
        User::create($data);
        return back()->with('success', 'User created successfully!');
    }

    // get list
    public function getList(){
        $query = User::query();
        $users = $query->orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.user.list', compact('users'));
    }

    // get user data
    private function getUserData(Request $request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'city' => $request->city,
            'location' => $request->location,
            'address' => $request->address,
        ];
    }
}
