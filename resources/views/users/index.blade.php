@extends('layouts.app')

@section('content')
    <x-container :titel="__('users.table.titel')">
        <x-sleek::card>
            <x-sleek::entity-table
                key="users"
                :entities="$users"
                :columns="['name','personalData.firstname' => ['label'=> __('users.fields.firstname')],'birthday' => ['label'=> __('users.fields.birthday')],'personalData.lastname' => ['label'=> __('users.fields.lastname')],'email','available_sessions','role','actions']"
                :sortable="['name']"
            >
                <x-slot:column-birthday bind="$_, $user">
                    {{isset($user->personalData->birthday) ? $user->personalData->birthday->format('d.m.Y') : ''}}
                </x-slot:column-birthday>
                <x-slot:column-role bind="$_, $user">
                    {{implode(', ',$user->getRoleNames()->toArray())}}
                </x-slot:column-role>
                <x-slot:column-actions bind="$_,$user">
                    <div class="d-flex gap-2">
                        <x-sleek::form method="DELETE" action="{{route('admin.users.destroy',compact('user'))}}">
                            <x-sleek::form-actions />
                        </x-sleek::form>
                        <a class="btn btn-primary" href="{{route('admin.users.show', $user)}}">{{__('common.actions.show')}}</a>
                    </div>
                </x-slot:column-actions>
            </x-sleek::entity-table>
        </x-sleek::card>
    </x-container>
@endsection

