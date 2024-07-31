<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modaltable;

class ModalTableController extends Controller
{
    public function Modalshow()
    {
        $data = Modaltable::all();
        return view('modalTable', compact('data'));
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
}
