<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

use Alert;
use Exception;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
use SweetAlert2\Laravel\Swal;

class BookController extends Controller
{
    //
    function listBooks(){
        $books = Book::all();
        return view('home', ['books'=>$books]);
    }

    function listAdminBooks(){
        // $books = Book::all();
        // return view('admin-portal', ['books'=>$books]);
        return Auth::getUser();
    }

    function addBook(Request $request){
        $request->validate([
            'bookname'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'published'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'img_url'=>'required'
        ]);
        $book = new Book;
        $book->name = $request->bookname;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->published = $request->published;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->picture = $request->img_url;
        try{
            if($book->save()){
                FacadesAlert::success('Congratulatiions', 'Book Added Successfully');
                return redirect('admin-portal');
            }

        } catch(Exception $e){
            return "Error: ".$e;
        }
        
    }

    function deleteBook($id){
        Swal::fire([
            'title'=> "Are you sure?",
            'text'=> "You won't be able to revert this!",
            'icon'=> "warning",
            'showCancelButton'=> true,
            'confirmButtonColor'=> "#3085d6",
            'cancelButtonColor'=> "#d33",
            'confirmButtonText'=> "Yes, delete it!"
        ]);
        return redirect()->back();

        // try{
        //     $idDeleted = Book::destroy($id);
        //     if($idDeleted){
        //         Alert::success('Congratulatiions', 'Book Deleted Successfully');
        //         return redirect('admin-portal');
        //     }
        // } catch(Exception $e){
        //     return "Error: ".$e;
        // }
        
    }

    function populateForm($id){
        $book = Book::find($id);
        return view('update-books', ['data'=>$book]);
    }

    function updateBook(Request $request, $id){
        $request->validate([
            'bookname'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'published'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'img_url'=>'required'
        ]);
        $book = Book::find($id);
        $book->name = $request->bookname;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->published = $request->published;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->picture = $request->img_url;
        try{
            if($book->save()){
                FacadesAlert::success('Congratulatiions', 'Book Updated Successfully');
                return redirect('admin-portal');
            }

        } catch(Exception $e){
            return "Error: ".$e;
        }
    }




}
