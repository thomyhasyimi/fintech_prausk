<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        if(!$user) {
            return view('login');
        }
        
        if($user->role == "siswa") {
            return view('siswa.index', compact('user'));    
        } elseif($user->role == "kantin") {
            $products = Product::get();
            $proto = $products->count();
            return view('kantin.index', compact('products', 'user', 'proto'));
        } elseif($user->role == "bank"){
            return view('bank.index',compact('user', ));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

    

    public function logout() {
        Session::flush();
        return redirect()->back();
    }


    public function login(Request $request) {
        $user = User::where('name', $request->name)->first();
        if(!$user || $request->password != $user->password) {
            return redirect()->back()->with('status', 'Login failed');
        }
        
        Auth::login($user);
        
        return redirect()->back();
    }

}
