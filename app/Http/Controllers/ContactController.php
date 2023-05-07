<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index()
  {
    return view('index');
  }
  public function confirm(StoreContactRequest $request)
  {
    $contacts = $request->all();
    if ($contacts['gender'] == 1) {
      $gender = '男性';
    } else {
      $gender = '女性';
    }

    return view('confirm', compact('contacts', 'gender'));
  }

  public function send(Request $request)
  { {
      $contacts = $request->all();

      if ($request->has("back")) {
        return to_route('contact.index')->withInput($contacts);
      } else {
        $formatted_postcode = preg_replace('/[^0-9]/', '', $request->postcode);
        $formatted_postcode = substr_replace($formatted_postcode, '-', 3, 0);

        $contacts = Contact::create([
          'fullname' => $request['first_name'] . ' ' . $request['second_name'],
          'gender' => $request->gender,
          'email' => $request->email,
          'postcode' => $formatted_postcode,
          'address' => $request->address,
          'building_name' => $request->building_name,
          'opinion' => $request->opinion,
        ]);
        return view('complete');
      }
    }
  }
}
