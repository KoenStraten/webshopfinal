<?php

namespace App\Http\Controllers;

use App\Adress;
use App\User;
use App\UserRole;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('pages/admin/users/index', compact('users'));
    }

    public function create()
    {
        $roles = UserRole::orderBy('role', 'desc')->get();
        return view('pages/admin/users/create', compact('roles'));
    }


    public function edit($category) {
        $roles = UserRole::orderBy('role', 'desc')->get();
        $user = User::find($category);

        return view('pages/admin/users/edit', compact('roles', 'user'));
    }


    public function update() {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'city' => 'required|',
            'zipcode' => 'required|min:6|max:6',
            'housenumber' => 'required|numeric',
            'streetname' => 'required',
        ]);

        $adress = Adress::find(request('address_id'));
        $adress->city = request('city');
        $adress->zipcode = request('zipcode');
        $adress->streetname = request('streetname');
        $adress->housenumber = request('housenumber');
        $adress->save();

        $user = User::find(request('user_id'));
        $user->name = request('name');
        $user->email = request('email');
        $user->role = request('role');
        $user->save();

        return redirect('/admin/users');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|string|min:5|confirmed',
            'city' => 'required|',
            'zipcode' => 'required|min:6|max:6',
            'housenumber' => 'required|numeric',
            'streetname' => 'required',
        ]);

        Adress::create(request(['city', 'zipcode', 'streetname', 'housenumber']));
        $adress_id = Adress::getLast()->id;

        User::create([
            'adress_id' => $adress_id,
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role' => request('role'),
        ]);

        return redirect('/../admin/users');
    }

    public function remove($id)
    {
        User::find($id)->delete();
        return redirect('/../admin/users');
    }

    public function user() {
        $user = Auth::user();
        return view('pages/user', compact('user'));
    }
}
