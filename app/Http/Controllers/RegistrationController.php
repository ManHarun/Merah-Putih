<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registration',[
            'registrations' => Auth::user()->registrations,
            'categories'=> Category::all()
        ]);
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
        $validatedData = $request->validate([
            'name' => ['required','min:3', 'max:255'],
            'tanggal_lahir' => ['required','date'],
            'phone' => ['min:10', 'max:12', 'required'],
            'address' => ['max:255', 'required'],
            'category_id' => ['required','exists:categories,id',],
        ]);
        $validatedData['user_id'] = Auth::id();
        if (Registration::where('user_id', Auth::id())->where('category_id', $validatedData['category_id'])->exists()) {
            return redirect()->back()->with('error', 'Anda telah terdaftar dengan kategori ini sebelumnya.');
        }
        Registration::create($validatedData);
        return redirect('/registration')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        $rules = [
            'name' => ['required','min:3', 'max:255'],
            'tanggal_lahir' => ['required','date'],
            'phone' => ['min:10', 'max:12', 'required'],
            'address' => ['max:255', 'required'],
            'category_id' => ['required','exists:categories,id',],
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = Auth::id();
        if (Registration::where('user_id', Auth::id())->where('category_id', $validatedData['category_id'])->exists()) {
            return redirect()->back()->with('error', 'Anda telah terdaftar dengan kategori ini sebelumnya.');
        }
        $registration->update($validatedData);
        return redirect('/registration')->with('success', 'Data Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        Registration::destroy($registration->id);
        return redirect('/registration')->with('success', 'Data Berhasil DiHapus');
    }
}
