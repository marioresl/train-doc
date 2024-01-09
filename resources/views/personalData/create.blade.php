@extends('layouts.app')

@section('content')
    <x-container>
        <x-sleek::card>
            <x-sleek::form
                action="{{route('users.personalData.store', $user)}}"
            >
                <x-sleek::form-field name="firstname" label="{{__('users.fields.firstname')}}"></x-sleek::form-field>
                <x-sleek::form-field name="lastname" label="{{__('users.fields.lastname')}}"></x-sleek::form-field>
                <x-sleek::form-field name="phone" label="{{__('users.fields.phone')}}"></x-sleek::form-field>
                <x-sleek::form-field name="addresse" label="{{__('users.fields.addresse')}}"></x-sleek::form-field>
                <x-sleek::form-actions></x-sleek::form-actions>
            </x-sleek::form>
        </x-sleek::card>
    </x-container>
@endsection
