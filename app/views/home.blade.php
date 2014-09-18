@extends('layouts.default')

@section('body')
{{ Former::open()->rules(ClinicInTheSky\Person::$rules)->method('GET') }}
  {{ Former::text('first_name') }}
  {{ Former::text('last_name') }}
  {{ Former::select('gender') }}
{{ Former::close() }}
@stop