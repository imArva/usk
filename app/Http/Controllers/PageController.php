<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function home(Request $request) {

        if (Auth::check()) {
            $query = $request->input('q');

            if ($query) {
                $book = Book::where('title', 'like', '%' . $query . '%')->get();

                return view('home', [
                    'books' => $book
                ]);
            }

            return view('home', [
                'books' => Book::all()
            ]);
        }

        return view('home');
    }
}