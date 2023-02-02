<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //get and show all listings
    public function index()
    {
        return view('listings.index', [
            //variable named listing which is an array
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplepaginate(5)
        ]);
    }

    //to show single listings

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create()
    {
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }



        Listing::create($formFields);

        // return redirect('/')->with('message', 'Item created successfully.');
        return redirect('/')->with('message', 'Item created successfully.');
    }

    //show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }


    //update listing data
    public function update(Request $request, Listing $listing)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();



        $listing->update($formFields);

        // return redirect('/')->with('message', 'Item created successfully.');
        return back()->with('message', 'Item updated successfully.');
    }

    //delete gig
    public function remove(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'item deleted succesfully');
    }
}
