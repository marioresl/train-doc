@extends('layouts.app')

@section('content')
    <x-container :titel="$user->name">
        <x-sleek::card>
            <div class="row">
                <div class="col-7">
                    <dl>
                        <dt>Vorname</dt>
                        <dd>{{$user->personalData->firstname ?? 'k.A.'}}</dd>

                        <dt>Nachname</dt>
                        <dd>{{$user->personalData->lastname ?? 'k.A.'}}</dd>

                        <dt>E-Mail</dt>
                        <dd>{{$user->email ?? 'k.A.'}}</dd>

                        <dt>Telefon</dt>
                        <dd>{{$user->personalData->phone ?? 'k.A.'}}</dd>

                        <dt>Adresse</dt>
                        <dd>{{$user->personalData->address ?? 'k.A.'}}</dd>


                    </dl>
                </div>
                <div class="col-5">
                    <div class="d-flex justify-content-between mb-1">
                        <i data-bs-target="#add-sessions" data-bs-toggle="modal" class="bi bi-plus-circle-fill fs-2 text-success" style="cursor: pointer"></i>
                        <i class="bi bi-dash-circle-fill fs-2 text-danger" style="cursor: pointer"></i>
                    </div>
                    <x-sleek::card reactivity="true" >
                        <div class="text-center">
                            <h3>Verbleibend</h3>
                            <div class="fs-3">{{$user->available_sessions}}</div>
                        </div>
                    </x-sleek::card>
                </div>
            </div>
        </x-sleek::card>
    </x-container>
@endsection
<x-sleek::modal-form
    title="{{__('users.modal.titel')}}"
    :action="route('admin.users.sessions.store', compact('user'))"
    method="POST"
    id="add-sessions"
>
    <x-sleek::form-field required key="sessions" name="hours" type="number" step="1" />
    <x-sleek::form-field required key="sessions" name="date" type="date" />
    <input type="hidden" value="receive" name="type" />
</x-sleek::modal-form>

