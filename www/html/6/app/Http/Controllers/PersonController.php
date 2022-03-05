<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function add(Request $request)
    {
        $items = Person::all();
        return view('person.add', ['items' => $items]);
    }

    public function create(AddPersonRequest $request)
    {
        $person = new Person();
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('person/add');
    }
}
