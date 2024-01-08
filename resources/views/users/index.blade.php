@extends('layouts.app')

@section('content')
    <x-container :titel="__('users.table.titel')">
        <x-sleek::card>
            <x-sleek::entity-table
                key="users"
                :entities="$users"
                :columns="['name','email','available_sessions','role','actions']"
            >
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

