<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get(); //digunakan untuk mengambil data dari tabel users.
            //latest() adalah method Eloquent yang mengurutkan data berdasarkan kolom waktu terbaru.
        return view('dashboard', compact('users'));
            //compact() adalah fungsi bawaan PHP yang membuat array dari sebuah variabel.
    }
    
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect()
        ->back()
        ->with('success', 'User berhasil ditambahkan');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email|max:255',
    ]);

    $user=User::findOrFail($id);

    $user->update([
        'name'=>$request->name,
        'email'=>$request->email,
    ]);

    return redirect()->route('dashboard')->with('success','Data berhasil diperbarui');
}
}
