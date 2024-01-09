@extends('layouts.app')

@section('content')
    <x-container :titel="$user->name">
        <x-sleek::card>
            <div class="row">
                <div class="col-md-7 col-12 order-md-1">
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
                <div class="col-md-5 col-12 order-md-2 d-flex flex-column">
                    <x-sleek::card reactivity="true">
                        <div class="text-center">
                            <h3>Verbleibend</h3>
                            <div class="fs-3">{{$user->available_sessions}}</div>
                        </div>
                    </x-sleek::card>
                    <div class="mt-2">
                        <button data-bs-target="#add-sessions" data-bs-toggle="modal" class="btn btn-success w-100">
                            Stunden aufstocken
                        </button>
                    </div>

                    <div class="mt-2 ">
                        <button class="btn btn-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#history" aria-expanded="false" aria-controls="history">
                            Verlauf der gutgeschriebenen/verbrauchten Stunden
                        </button>
                    </div>
                </div>
            </div>
            <div class="collapse mt-2" id="history">
                <div class="card card-body">
                    <x-sleek::entity-table
                        key="sessions"
                        :entities="$sessions"
                        :columns="['type' => ['label' => ''],'name','date', 'hours', 'created_at']"
                        >
                        <x-slot:column-type bind="$type">
                            {!! $type === 'claim' ? '<i class="bi bi-dash-circle-fill text-danger"></i>' : '<i class="bi bi-plus-circle-fill text-success"></i>'!!}
                        </x-slot:column-type>
                        <x-slot:column-name bind="$_,$session">
                            {!! $session->course->name ?? '<i>Gutschrift</i>' !!}
                        </x-slot:column-name>

                        <x-slot:column-date bind="$date">
                            {{$date->format('d.n.Y')}}
                        </x-slot:column-date>
                        <x-slot:column-created_at bind="$created_at">
                            {{$created_at->format('d.n.Y H:m')}}
                        </x-slot:column-created_at>
                    </x-sleek::entity-table>
                </div>
            </div>
        </x-sleek::card>

    </x-container>
@endsection
<x-sleek::modal-form
    title="Stunden aufstocken"
    :action="route('admin.users.sessions.store', compact('user'))"
    method="POST"
    id="add-sessions"
>
    <x-sleek::form-field required key="sessions" name="hours" type="number" step="1" />
    <x-sleek::form-field required key="sessions" name="date" type="date" />
    <input type="hidden" value="receive" name="type" />
</x-sleek::modal-form>

