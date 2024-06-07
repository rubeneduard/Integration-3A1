<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Room;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function userDashboard()
    {
        $rooms = Room::all();
        return inertia('UserDashboard', compact('rooms'));
    }

    public function bookRoom(Room $room)
    {

        return inertia('User/bookRoom', compact('room'));
    }


    public function myBook()
    {

        if (Auth::id()) {
            $userid=Auth::user()->id;
            $books = Book::where('user_id', $userid)->get();
            return inertia('User/myBook', compact('books'));
        } else {
            return redirect()->back();
        }
    }


    public function saveBook(Request $request): RedirectResponse
    {
        $request->validate([
        
 
            'pmethod' => 'required',
         
        ]);
    
        $book = new Book;
    
        // Assign values to the book object
        $book->image = $request->image;
        $book->room = $request->room;
        $book->type = $request->type;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->status = $request->status;
        $book->pmethod = $request->pmethod;
        $book->username = Auth::user()->name; 
    
        if (Auth::check()) { 
            $book->user_id = Auth::id(); 
        }
    
        $book->save(); 
    
        return Redirect::route('myBook');
    }

    public function cancelBook($id): RedirectResponse
    {

        $data = Book::find($id);

        $data->delete();

        return Redirect::route('myBook');
    }
    
    
}
