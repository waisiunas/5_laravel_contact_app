<?php

namespace App\Http\Controllers;

use App\Models\ContactList;
use Illuminate\Http\Request;

class ContactListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('list.index', [
            'contact_lists' => ContactList::paginate(3),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('list.create', [
            'contact_lists' => ContactList::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:contact_lists,name']
        ]);

        $data = [
            'name' => $request->name,
        ];

        $is_created = ContactList::create($data);

        if ($is_created) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactList $contactList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactList $contactList)
    {
        return view('list.edit', [
            'contact_list' => $contactList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactList $contactList)
    {
        $request->validate([
            'name' => ['required', 'unique:contact_lists,name,' . $contactList->id . ',id']
        ]);

        $data = [
            'name' => $request->name,
        ];

        $is_updated = $contactList->update($data);

        if ($is_updated) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactList $contactList)
    {
        $is_deleted = $contactList->delete();

        if ($is_deleted) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
