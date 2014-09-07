<?php

class PeopleController extends \BaseController {

	/**
	 * Display a listing of persons
	 *
	 * @return Response
	 */
	public function index()
	{
		$people = Person::all();

		return View::make('persons.index', compact('persons'));
	}

	/**
	 * Show the form for creating a new person
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('persons.create');
	}

	/**
	 * Store a newly created person in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Person::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Person::create($data);

		return Redirect::route('persons.index');
	}

	/**
	 * Display the specified person.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$person = Person::findOrFail($id);

		return View::make('persons.show', compact('person'));
	}

	/**
	 * Show the form for editing the specified person.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$person = Person::find($id);

		return View::make('persons.edit', compact('person'));
	}

	/**
	 * Update the specified person in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$person = Person::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Person::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$person->update($data);

		return Redirect::route('persons.index');
	}

	/**
	 * Remove the specified person from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Person::destroy($id);

		return Redirect::route('persons.index');
	}

}
