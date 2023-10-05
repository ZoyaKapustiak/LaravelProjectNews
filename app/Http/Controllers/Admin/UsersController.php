<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{

    public function isadmin(User $user)
    {
//        $user = User::find($userId);
//        var_dump($user);
        $user->is_admin = !$user->is_admin;
        $user->save();
//        if(!$user->is_admin) {
//            $user->is_admin = !$user->is_admin;
//            $user->save();
//        } else {
//            $user->is_admin = !$user->is_admin;
//            $user->save();
//        }
        return redirect()->route('admin.users.index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $usersList = User::all();
        return view('admin.users.index', ['usersList' => $usersList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
