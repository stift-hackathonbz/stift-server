@extends('layouts.app')

@section('content')
    <checklist :checklist_id='{{$checklist->id}}'></checklist>
@endsection
