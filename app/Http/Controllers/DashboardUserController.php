<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'user',
            'users' => User::with('prodis')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Tambah User',
            'prodis' => Prodi::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|max:255',
            'name' => 'required|max:255',
            'asalkampus' => 'required|max:255',
            'password' => 'required|max:255',
            'role' => 'required',
            'id_prodi' => 'required|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = intval($validatedData['role']);

        User::create($validatedData);

        return redirect('/dashboard/user')->with('success', 'User berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'prodis' => Prodi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validate([
            'nim' => 'required|max:255',
            'name' => 'required|max:255',
            'asalkampus' => 'required|max:255',
            'role' => 'required',
            'id_prodi' => 'required|max:255',
        ]);

        $validatedData['role'] = intval($validatedData['role']);

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/user')->with('success', 'User berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/user')->with('success', "user $user->nama berhasil dihapus!");
    }

    public function resetPasswordAdmin(Request $request)
    {
        $rules = [
            'password' => 'required|min:5|max:255',
        ];

        if ($request->password == $request->password2) {
            $validatedData = $request->validate($rules);
            $validatedData['password'] = Hash::make($validatedData['password']);

            User::where('id', $request->id)->update($validatedData);
        } else {
            return back()->with('failed', 'Konfirmasi password tidak sesuai');
        }

        return redirect('/dashboard/user')->with('success', 'Password berhasil direset!');
    }
}
