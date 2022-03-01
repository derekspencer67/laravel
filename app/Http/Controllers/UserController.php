<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(Request $request)
    {

        $this->middleware('auth');
        $this->middleware('checkRole');

    }

    public function checkRole()
    {
        dd('checkRole');
    }

    public function index(Request $request)
    {

        $authorizedRoles = ['Moderator', 'Theme Manager', 'User Administrator'];

        $users = User::whereHas('roles', static function ($query) use ($authorizedRoles) {
            return $query->whereIn('name', $authorizedRoles);
        })->get();

        return view('admin.index', compact( 'users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create($data);

        // Store data in Role User table based on role selected

        $users = User::all()->where('email', '=', $request->email)->first();

        $users->roles()->sync($request->roles);

        $request->session()->flash('status', 'User Created.');

        return redirect('/admin/users');

    }

    public function show(User $user)
    {
        return view('admin.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($this->validatedData());

        // Store data in Role User table based on role selected

        $users = User::all()->where('email', '=', $request->email)->first();

        $users->roles()->sync($request->roles);

        $request->session()->flash('status', 'User Updated.');

        return redirect('/admin/users');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        DB::table('users')->where('id','=',$user->id)->update([
            'deleted_by' => Auth::id()
        ]);

        $request->session()->flash('deny', 'User Deleted.');

        return redirect('/admin/users');
    }

    protected function validatedData() {

        return request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
    }

}
