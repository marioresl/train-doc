@extends('layouts.app')

@section('content')
    <x-container titel="Kurse">
        <x-sleek::card>
            <x-slot:header class="bg-white">
                <a href="{{route('admin.courses.create')}}" class="btn btn-primary">Hinzufügen</a>
            </x-slot:header>
            <div class="d-flex flex-wrap justify-content-center gap-3">
            @foreach($courses as $course)
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->name }}</h5>
                                <p class="card-text">Dauer: {{ $course->duration }}h</p>
                                <p class="card-text">Datum: {{ $course->date->format('d.m.Y') }}</p>
                                <p class="card-text">Teilnehmer: {{ $course->users_count }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a class="btn btn-secondary w-100 mx-2" href="{{route('admin.courses.show', $course)}}">Details</a>
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>
        </x-sleek::card>
    </x-container>
@endsection

