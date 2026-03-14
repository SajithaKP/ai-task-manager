<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    protected $repo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $users = $this->repo->all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->repo->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->repo->find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->repo->update($id, [
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->repo->delete($id);

        return redirect()->route('users.index');
    }
}