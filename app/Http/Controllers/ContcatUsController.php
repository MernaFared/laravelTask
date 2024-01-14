<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Add this line

 
class ContcatUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contactUs');
    }

    public function sendEmail(Request $request)
{
    
    try {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormMail($data));
        return 'done';

        // Add any additional logic if needed

        Log::info('Email sent successfully!');
    } catch (\Exception $e) {
        // Log the exception
         Log::error($e);

        return "Something went wrong. Please try again.";
    }
}
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
