<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactFormRequest;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message=Message::paginate(10);
        $titre='message';
        return view('admin.messages.liste',compact('message','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactFormRequest $request)
    {
        $message = Message::create($request->only('name','email','message'));

        Mail::to(config('laracarte.admin_support_email'))
            ->queue(new ContactMessageCreated($message));

        flashy()->message('Message envoyé avec succès, nous vous repondrons dans un bref delais!');

        return redirect(route('root_path'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $contact)
    {
        $contact->delete();

        flashy()->error(sprintf("Le message de '%s' a été supprimé avec succès",$contact->name));
        return redirect(route('contact.index'));
    }
}
