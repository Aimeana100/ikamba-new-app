<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create(): View
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $request->validateResolved();
        $pass = '12345678';
        $newuser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($pass),
        ]);

        $role = Role::where('name', $request->role)->first();
        $newuser->roles()->attach($role);
        return redirect()->route('admin.users');

    }

    public function edit(int $id): View
    {

        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user', 'roles'));

    }

    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $user = User::findOrFail($request->input('id'));
        $user->update([
            'name' => $request->input('name',),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
        ]);

        if ($request->has('role')) {
            $role = Role::where('name', $request->role)->first();
            $user->roles()->sync([$role->id]);

        }
        return redirect()->route('admin.users');
    }
}
