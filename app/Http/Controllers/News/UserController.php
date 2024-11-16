<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Mail\NewUserEmail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::with('roles');
        $userStatus = $request->status ?? 'active';

        if ($request->has('search')) {
            $users = $users->where('name', 'like', '%' . $request->search . '%');
        }

        $users = User::with('roles')->where('status', $userStatus);

        $users = $users->get();

        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles', 'userStatus'));
    }

    public function create(): View
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $pass = generateRandomPassword(12);
        $newuser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($pass),
        ]);

        $role = Role::where('name', $request->role)->first();
        $newuser->roles()->attach($role);
        Mail::to($newuser)->send(new NewUserEmail($newuser, $pass));


        return redirect()->back()->with('success', 'User created and credentials sent!');;

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
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
        ]);

        if ($request->has('role')) {
            $role = Role::where('name', $request->role)->first();
            $user->roles()->sync([$role->id]);

        }
        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function delete(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    public function activate(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User Activated successfully!');
    }
}
