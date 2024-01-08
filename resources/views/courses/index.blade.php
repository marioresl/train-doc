@extends('layouts.app')

@section('content')
    <x-container titel="Kurse">
        <x-sleek::card>
            <x-slot:header class="bg-white">
                <a href="{{route('admin.courses.create')}}" class="btn btn-primary">Hinzufügen</a>
            </x-slot:header>

        </x-sleek::card>
    </x-container>
@endsection
