<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    $contacts = Contact::paginate(10);

    return view('admin', compact('contacts'));
  }

  public function search(Request $request)
  {
    $query = Contact::query();

    if ($request->filled('name')) {
      $query->where('fullname', 'like', '%' . $request->input('name') . '%');
    }

    if ($request->filled('gender') && $request->input('gender') != 0) {
      $query->where('gender', $request->input('gender'));
    }

    if ($request->filled('created_at_start')) {
      $query->where('created_at', '>=', $request->input('created_at_start'));
    }

    if ($request->filled('created_at_end')) {
      $endDate = date('Y-m-d', strtotime($request->input('created_at_end') . ' +1 day'));
      $query->where('created_at', '<', $endDate);
    }

    if ($request->filled('email')) {
      $query->where('email', 'like', '%' . $request->input('email') . '%');
    }

    $contacts = $query->paginate(10)->appends($request->query());
    return view('admin', compact('contacts'));
  }

  public function delete($id)
  {
    $contact = Contact::find($id);
    $contact->delete();
    return redirect()->route('admin.index');
  }
}
