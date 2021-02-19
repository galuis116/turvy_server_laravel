<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSOS;
use App\SosContact;
use App\SosRequest;

class SosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:soscontact-list|soscontact-create|soscontact-edit|soscontact-delete', ['only' => ['contactList']]);
        $this->middleware('permission:soscontact-create', ['only' => ['addContact','storeContact']]);
        $this->middleware('permission:soscontact-edit', ['only' => ['editContact','updateContact', 'activeContact']]);
        $this->middleware('permission:soscontact-delete', ['only' => ['deleteContact']]);

        $this->middleware('permission:sosrequest-list|sosrequest-delete', ['only' => ['requestList']]);
        $this->middleware('permission:sosrequest-delete', ['only' => ['deleteRequest']]);
    }
    public function contactList()
    {
        $contacts = SosContact::all();
        return view('admin.sos.index')
            ->with('contacts', $contacts)
            ->with('page', 'sos')
            ->with('subpage', 'contact');
    }
    public function addContact()
    {
        return view('admin.sos.add')
            ->with('page', 'sos')
            ->with('subpage', 'contact');
    }
    public function storeContact(StoreSOS $request)
    {
        $request->validated();
        $contact = new SosContact();
        $contact->name = $request->name;
        $contact->number = $request->number;
        $contact->save();

        return redirect()->back()->with('message', 'It has been saved successfully.');
    }
    public function editContact($id)
    {
        $contact = SosContact::find($id);
        return view('admin.sos.add')
            ->with('contact', $contact)
            ->with('page', 'sos')
            ->with('subpage', 'contact');
    }
    public function updateContact(StoreSOS $request, $id)
    {
        $request->validated();
        $contact = SosContact::find($id);
        $contact->name = $request->name;
        $contact->number = $request->number;
        $contact->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function activeContact($id)
    {
        $contact = SosContact::find($id);
        $contact->status = !$contact->status;
        $contact->save();

        return redirect()->back()->with('message', 'It has been changed successfully.');
    }
    public function deleteContact($id)
    {
        $contact = SosContact::find($id);
        $contact->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }

    public function requestList()
    {
        $requests = SosRequest::all();
        return view('admin.sos.request')
            ->with('requests', $requests)
            ->with('page', 'sos')
            ->with('subpage', 'request');
    }
    public function deleteRequest($id)
    {
        $request = SosRequest::find($id);
        $request->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
