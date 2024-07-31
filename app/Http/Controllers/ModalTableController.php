<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modaltable;

class ModalTableController extends Controller
{
    public function ElementModalShow(Request $request)
  {
    $id = $request->input('id'); // Get the ID from the request
    $data = Modaltable::where('id', $id)->get();
    return view('ElementModalTable', compact('data'));
  }
    public function Modalshow()
       {
        $records = Modaltable::all();
        return view('main', compact('records'));
    }

    public function storeData(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:modaltables,email',
        ]);

        Modaltable::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json(['success' => 'Data added successfully']);
    }
    public function fetchRecords()
{
    $records = Modaltable::all(); // Fetch all records or use pagination
    return view('recordsTable', compact('records')); // Return the partial view with the updated records
}
}
