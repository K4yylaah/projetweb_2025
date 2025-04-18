@extends('layouts.modal', [
    'id' => 'student-modal',
    'title' => 'Informations étudiant',
])

@section('modal-content')
    Informations étudiant
    @php
        $students = \App\Models\UserSchool::where('role', 'student')->get();
        $cohorts = \App\Models\Cohort::all();
    @endphp

    <div class="card-body flex flex-col gap-5">
        <x-forms.dropdown name="user_id" :label="__('Etudiant')">
            <x-slot name="options">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </x-slot>
        </x-forms.dropdown>

        <x-forms.dropdown name="cohort_id" :label="__('Promotion')">
            <x-slot name="options">
                @foreach ($cohorts as $cohort)
                    <option value="{{ $cohort->id }}">{{ $cohort->name }}</option>
                @endforeach
            </x-slot>
        </x-forms.dropdown>
        <x-forms.input name="birth_date" type="date" :label="__('Date de naissance')" />
        <x-forms.input name="email" type="email" :label="__('Email')" />
    </div>
@overwrite
<script src="{{ asset('js/pages/students/student-modal.js') }}"></script>