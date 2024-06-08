<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    public function create()
    {
        return view('authors/author-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date', function ($attribute, $value, $fail) {
                $age = Carbon::parse($value)->age;
                if ($age < 10) {
                    $fail('The ' . $attribute . ' must be at least 10 years old');
                }
            }],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string',],
        ]);

        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'role' => User::USER_ROLE_AUTHOR,
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'password' => Hash::make($validatedData['email']),
            'created_by' => Auth::user()->id, //nullable
            'is_active' => true, //default true
            'is_default_password_changed' => false, //default true

        ]);

        return redirect()->route('author.all')->with(
            'status',
            'New Author was added successfully.'
        );
    }

    public function index()
    {
        $authors = User::where('role', User::USER_ROLE_AUTHOR)->get();
        return view('authors/index', ['authors' => $authors]);
    }

    public function view(int $id)
    {
        $author = User::findOrFail($id);
        return view('authors.view', ['author' => $author]);
    }

    public function edit(int $id)
    {
        $author = User::findOrFail($id);
        return view('authors/edit-form', compact('author'));
    }
}
