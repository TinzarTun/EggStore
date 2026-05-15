<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:30',
            'email' => 'nullable|email:rfc,dns|max:50|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|digits_between:1,15|unique:users,phone',
            'gender' => 'nullable',
            'city' => 'nullable',
            'location' => 'nullable',
            'address' => 'nullable|string|max:255',
            'terms' => 'accepted',
        ], [
            'image.image' => 'The uploaded file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2048 kilobytes',
            'name.required'=> 'Your name is required',
            'name.max' => 'Name must not exceed 30 characters',
            'email.unique' => 'This email is already taken',
            'email.email' => 'Please provide a valid email address',
            'password.required'=> 'Your password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.confirmed' => 'Password confirmation does not match',
            'phone.max' => 'Phone number must not exceed 15 characters',
            'phone.digits_between' => 'Phone number must contain only digits and maximum 15 digits',
            'phone.unique' => 'This phone number is already taken',
            'address.max' => 'Address must not exceed 255 characters',
            'terms.accepted' => 'You must agree to the Terms and Conditions',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ensure at least email or phone is provided
        if (!$request->filled('email') && !$request->filled('phone')) {
            return back()
                ->withErrors([
                    'contact' => 'You must provide at least an email or a phone number.'
                ])
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
    public function getList(Request $request)
    {
        $query = User::query();

        // Search by name, email, or phone
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Search by city
        if ($request->filled('city')) {
            if ($request->city === 'unknown') {
                $query->whereNull('city')
                      ->orWhere('city', '');
            } else {
                $query->where('city', $request->city);
            }
        }

        // Search by status (role + permission logic)
        if ($request->filled('status')) {
            if ($request->status === 'yes') {
                $query->whereHas('roles.permissions');
            }

            if ($request->status === 'no') {
                $query->whereDoesntHave('roles.permissions');
            }
        }

        $users = $query->orderBy('updated_at', 'desc')
                       ->paginate(5)
                       ->appends($request->all());

        return view('admin.user.list', compact('users'));
    }

    // get delete
    public function getDelete($id)
    {
        $user = User::findOrFail($id);

        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('user.list')->with('success', 'User deleted successfully!');
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
