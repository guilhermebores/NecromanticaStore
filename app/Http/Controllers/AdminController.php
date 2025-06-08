<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Purchase;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login(Request $request)
    {
       $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'Credenciais inválidas.']);
}
   public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    $admin = new User();
    $admin->name = $validatedData['name'];
    $admin->email = $validatedData['email'];
    $admin->password = Hash::make($validatedData['password']);
    $admin->is_admin = true;
    $admin->save();

    return redirect()->route('admin.dashboard')->with('success', 'Administrador criado com sucesso!');
}

public function create()
{
    return view('admin.auth.create');
}

public function showPurchases()
{
    $purchases = Purchase::with(['user', 'product'])->orderBy('created_at', 'desc')->get();
    return view('admin.purchases.index', compact('purchases'));
}

}
