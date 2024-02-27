<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::latest()->get();
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->all());

        return response()->json($contact, 201);
    }

    public function show(Contact $contact)
    {
        return $contact;
    }
}