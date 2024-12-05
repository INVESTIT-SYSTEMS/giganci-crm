<?php

namespace App\Http\Controllers;

use App\Mail\SendingMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $data = $request->get('check');
         dd($data);
         return view();

//        try {
//            $mailData = [
//                'title' => 'Siema siema',
//                'body' => 'Witam się z tobą',
//            ];
//            $addresses = [
//                new Address(''),
//                new Address(''),
//                new Address(''),
//                new Address(''),
//            ];
//                Mail::to($addresses)->send(new SendingMail($mailData));
//
//        } catch (\Exception $err)
//        {
//            return $err->getMessage();
//        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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
