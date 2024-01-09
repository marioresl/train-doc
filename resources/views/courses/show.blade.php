@extends('layouts.app')

@section('content')
    <x-container>
        <x-sleek::card>
            <x-sleek::entity-view
                :title="$course->name"
                key="courses"
                :model="$course"
                :fields="['date', 'duration', 'users_count']"
            >
                <x-slot:column-date bind="$date">
                    {{$date->format('d.m.Y')}}
                </x-slot:column-date>
                <x-slot:actions>
                    <a class="btn btn-secondary" href="{{ route('admin.courses.index') }}">Zurück</a>
                </x-slot:actions>
                <x-slot:attach>
                    <hr/>
                    <x-sleek::entity-table
                        key="courses"
                        :entities="$course->users"
                        :columns="['name', 'personalData.firstname' => ['label' => __('users.firstname')], 'personalData.lastname' => ['label' => __('users.lastname')]]"
                    >
                    </x-sleek::entity-table>
                </x-slot:attach>
            </x-sleek::entity-view>
        </x-sleek::card>
    </x-container>
@endsection
