<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
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

    public function editBook(Book $book) {
        return view('editbook',[
            'book' => $book
        ]);
    }

    public function actionEditBook(Request $request) {
        Book::find($request->id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'summary' => $request->summary,
            'date_of_issue' => $request->date_of_issue
        ]);

        Session::flash('success', 'Berhasil menambahkan buku');
        return redirect('/book/'.$request->id);
    }

    public function deleteBook($id) {
        Book::find($id)->delete();

        Session::flash('success', 'Berhasil Menghapus Buku');
        return redirect('/');
    }
}