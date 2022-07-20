<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index()
    {
        return view('admin_dashboard.contacts.index', [
            'contacts' => \DB::table('contacts')->get()
        ]);
    }

    public function destroy($id)
    {
        \DB::table('contacts')->where('id', $id)->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact Message has been Deleted.');
    }
}
