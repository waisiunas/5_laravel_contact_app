<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactList;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.index', [
            'contacts' => Contact::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create', [
            'contact_lists' => ContactList::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'list_id' => ['required'],
            'phone_no' => ['required'],
            'file' => ['image', 'mimes:png,jpg,jpeg'],
        ]);

        $file_name = null;

        if ($request->file->getError() === 0) {
            $file_name = "ACI-" . microtime(true) . "." . $request->file->extension();

            $request->file->move(public_path('template/img/contacts'), $file_name);
        }

        $data = [
            'contact_list_id' => $request->list_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_no,
            'dob' => $request->dob,
            'address' => $request->address,
            'picture' => $file_name,
        ];

        $is_created = Contact::create($data);

        if ($is_created) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contact.show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
