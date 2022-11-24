<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Language;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $people = Person::OrderBy('last_name')->with(['country','languages'])->get();
//        $people=Person::whereHas('languages',function(Builder $query){
//            $query->where('name','=','English');
//        })->orderBy('last_name')->with(['country','languages'])->get();
//        Querying with inner join
        return view('people.index',compact('people'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::OrderBy('name')->get();
        $languages = Language::OrderBy('name')->get();
        return view('people.create', compact('countries', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        Validate
        $request->validate([
            'first_name'=>['required','max:100'],
            'last_name'=>['required','max:100'],
            'country_id'=>['required']
        ]);

        $person = new Person;

        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->country_id = $request->country_id;
        $person->save();

        $person->languages()->sync($request->language_ids);

        return redirect(route('people.index'))->with('status', 'Person Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //How to grab language info?
        $countries = Country::OrderBy('name')->get();
        $languages = Language::OrderBy('name')->get();
        return view('people.edit',compact('person', 'countries', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
        $request->validate([
            'first_name'=>['required','max:100'],
            'last_name'=>['required','max:100'],
            'country_id'=>['required']
        ]);
        //save changes to person
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->country_id = $request->country_id;
        $person->save();



        //save the related languages in the pivot table
        $person->languages()->sync($request->language_ids);



        //redirect back to the list
        return redirect(route('people.index'))->with('status', 'Person updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
        $person->delete();
        return redirect(route('people.index'))->with('status', 'Person Deleted');
    }
}
