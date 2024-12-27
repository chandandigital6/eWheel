<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $contact = Contact::query();

        if (!empty($keyword)) {
            $contact->where('title', 'like', "%$keyword%");
        }
        $contactData = $contact->paginate(5);

        return view('contact.index',compact('contactData'));
    }

    public function create(){
        return view('contact.create');
    }

    public function store(ContactRequest $request){
        $contact=Contact::create($request->all());
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('contact', 'public'); // Save the image to the 'contact' folder
        //     $contact->image = str_replace('public/', '', $imagePath); // Update the image field
        //     $contact->save(); // Save the changes to the database
        // }
        return redirect()->route('contact.index')->with('success', 'contact  created successfully.');
    }

    public function edit(Contact $contact){

        return view('contact.create',compact('contact'));
    }

    public function update(Contact $contact , ContactRequest $request){
        $contactData = $request->all();

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/contact');
        //     $contactData['image'] = str_replace('public/', '', $imagePath);
        // }

        $contact->update($contactData);

        return redirect()->route('contact.index')->with('success', 'contact item successfully updated');
    }


    public function delete(Contact $contact){
        $contact->delete();
        return redirect()->route('contact.index')->with('error','Successfully  contact items deleted');

    }
    public function duplicate(Contact $contact){
        $productDuplicate=$contact->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
