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

class AdminController extends Controller
{
    public function adminDashboard(){
        $books = Book::all();
        return inertia('AdminDashboard', compact('books'));
    }


    public function adminRoom(){

        $rooms = Room::all();

        return inertia('Admin/Room', compact('rooms'));
    }

    public function addRoom(){

        return inertia('Admin/addRoom');
    }

    public function saveRoom(Request $request)
    {

        $request->validate([
            'image' => 'required',
            'room' => 'required',
            'type' => 'required',
            'price' => 'required',
            'description' => 'required',
      
        ]);

        $room = new Room;

        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('roomimage', $imagename);
        $room->image = $imagename;
        $room->room = $request->room;
        $room->type = $request->type;
        $room->price = $request->price;
        $room->description = $request->description;

        $room->save();

        return inertia('Admin/Room');
    }

    
    public function editAProfile(){

        return inertia('Admin/editAProfile');
    }

    public function editRoom(Room $room){

        return inertia('Admin/editRoom', compact('room'));
    }

    public function updateRoom(Request $request, Room $room): RedirectResponse
    {
        // Validate the request inputs
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'room' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
        ]);
    
        // Update the room properties
        $room->room = $request->room;
        $room->type = $request->type;
        $room->price = $request->price;
        $room->description = $request->description;
    
        // Check if an image file is provided
        if ($request->hasFile('image')) {
            // Handle image file upload
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('roomimage'), $imageName);
            $room->image = $imageName;
        }
    
        // Save the updated room
        $room->save();
    
        // Redirect back to the admin room page with a success message
        return Redirect::route('adminRoom')->with('success', 'Room updated successfully!');
    }

    public function deleteRoom($id): RedirectResponse
    {

        $data = Room::find($id);

        $data->delete();

        return Redirect::route('adminRoom')->with('success', 'Room updated successfully!');
    }


    public function manageBook(){


        $books = Book::all();
        return inertia('Admin/manageBook', compact('books'));
    }

    public function editBook(Book $book){

        return inertia('Admin/editBook', compact('book'));
    }



    public function updateBook(Request $request, Book $book): RedirectResponse
    {
        
        $request->validate([
       
            'status' => 'required|string|max:255',
        
        ]);
    
        $book->image = $request->image;
        $book->room = $request->room;
        $book->type = $request->type;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->username = $request->username;
        $book->user_id = $request->user_id;
        $book->status = $request->status;
        $book->pmethod = $request->pmethod;


        $book->save();
    
        // Redirect back to the admin room page with a success message
        return Redirect::route('manageBook');
    }

    

}
