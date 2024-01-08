@extends('layouts.app')

@section('content')
    <x-container titel="Kurs erstellen">
        <x-sleek::card>
            <x-sleek::form action="{{route('admin.courses.store')}}" method="POST">
                <div class="row">
                    <div class="col-4">

                    </div>
                    <div class="col-8">
                        <x-sleek::entity-table
                            key="users"
                            :entities="$users"
                            :columns="[
                            'actions' => ['label' => ''],
                            'personalData.firstname' => ['label' => __('users.firstname')],
                            'personalData.lastname' => ['label' => __('users.lastname')],
                            'name',
                            'email'
                          ]"
                        >
                            <x-slot:column-actions bind="$_, $user">
                                <input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}">
                            </x-slot:column-actions>
                        </x-sleek::entity-table>
                    </div>
                </div>
            </x-sleeK::form>


        </x-sleek::card>
    </x-container>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('tr');
        rows.forEach(row => {
            row.addEventListener('click', function() {
                let checkbox = this.querySelector('.user-checkbox');
                if (checkbox) {
                    checkbox.checked = !checkbox.checked;
                }
            });
        });
    });
</script>
