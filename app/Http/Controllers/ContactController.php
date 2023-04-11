<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactCollection;
use App\Http\Resources\ContactResource;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $Req) {
        $contact = new Contact();
        $contact->name = $Req->input('name');
        $contact->email = $Req->input('email');
        $contact->subject = $Req->input('subject');
        $contact->message = $Req->input('message');
        $contact->save();

        return redirect()->route('contact-route')->with('success', 'Contact added.');
    }

    public function updateContact($id, ContactRequest $Req) {
        $contact = Contact::find($id);
        $contact->name = $Req->input('name');
        $contact->email = $Req->input('email');
        $contact->subject = $Req->input('subject');
        $contact->message = $Req->input('message');
        $contact->save();

        return redirect()->route('contact-route')->with('success', 'Запись успешно обновлена');
    }

    public function deleteContact($id) {
        Contact::find($id)->delete();
        return redirect()->route('contact-route')->with('success', 'Запись успешно удалена');
    }

    public function contactUpdate ($id) {
        return view('contact-update', ['data' => Contact::find($id)]);
    }

    //api 
    public function getContact($id) {
        $contact = Contact::query()->find($id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact does not exist.'
            ]);
        }
        return response()->json([
            'success' => true,
            'contact' => new ContactResource($contact)
        ]);
    }

    public function getContacts() {
        $contacts = Contact::query()->get();

        return response()->json([
            'success' => true,
            'contacts' => new ContactCollection($contacts),
        ]);
    }
}
