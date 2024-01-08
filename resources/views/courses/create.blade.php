@extends('layouts.app')

@section('content')
    <x-container titel="Kurs erstellen">
        <x-sleek::card>
            <x-sleek::form action="{{route('admin.courses.store')}}" method="POST">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
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
                    <div class="col-sm-12 col-md-4">
                        <x-sleek::form-field key="courses" type="text" name="name" required />
                        <x-sleek::form-field key="courses" type="number" step="1" name="duration" required />
                        <x-sleek::form-field key="courses" type="date" name="date" required />
                        <button type="submit" class="btn btn-success w-100 submit" disabled>Einheit erstellen</button>
                    </div>

                </div>
            </x-sleeK::form>


        </x-sleek::card>
    </x-container>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('tr');
        const submitButton = document.querySelector('.submit');

        const updateSubmitButtonState = () => {
            const anyChecked = Array.from(document.querySelectorAll('.user-checkbox')).some(checkbox => checkbox.checked);
            submitButton.disabled = !anyChecked;
        };

        rows.forEach(row => {
            row.addEventListener('click', function() {
                let checkbox = this.querySelector('.user-checkbox');
                if (checkbox) {
                    checkbox.checked = !checkbox.checked;
                    updateSubmitButtonState();
                }
            });
        });

        updateSubmitButtonState();
    });
</script>

