<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function home() {

        if (Auth::check()) {
            return view('home', [
                'books' => Book::all()
            ]);
        }

        return view('home');
    }

    public function showBook(Book $book) {
        return view('book', [
            'book' => $book
        ]);
    }

    public function addBook(){
        return view('addbook');
    }

    public function actionAddBook(Request $request){
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'summary' => $request->summary,
            'date_of_issue' => $request->date_of_issue
        ]);
        
        Session::flash('success', 'Berhasil menambahkan buku');
        return redirect('/');
    }
}
