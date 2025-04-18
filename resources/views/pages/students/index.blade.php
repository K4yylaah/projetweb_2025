<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Etudiants') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Liste des étudiants</h3>
                        <div class="input input-sm max-w-48">
                            <i class="ki-filled ki-magnifier"></i>
                            <input placeholder="Rechercher un étudiant" type="text" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                @php
                                    $students = \App\Models\UserSchool::where('role', 'student')->get();
                                @endphp
                                @foreach ($students as $student)
                                    <table class="table table-border" data-datatable-table="true">
                                        <thead>
                                            <tr>
                                                <th class="min-w-[140px]">
                                                    <span class="sort asc">
                                                        <span class="sort-label text-center">Nom</span>
                                                        <span class="sort-icon"></span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[140px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-center">Prénom</span>
                                                        <span class="sort-icon"></span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[140px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-center">Date de naissance</span>
                                                        <span class="sort-icon"></span>
                                                    </span>
                                                </th>
                                                <th class="w-[70px]"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $student->last_name }}</td>
                                                <td>{{ $student->first_name }}</td>
                                                <td>{{ $student->birth_date }}</td>
                                                <td>
                                                    <div class="flex items-center justify-between">
                                                        <a href="{{ route('student.destroy', $student->id) }}">
                                                            <i class="text-success ki-filled ki-shield-tick"></i>
                                                        </a>

                                                        <a class="hover:text-primary cursor-pointer" href="#student-modal"
                                                            data-modal-toggle="#student-modal">
                                                            <i class="ki-filled ki-cursor"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                            <div
                                class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                <div class="flex items-center gap-2 order-2 md:order-1">
                                    Show
                                    <select class="select select-sm w-16" data-datatable-size="true"
                                        name="perpage"></select>
                                    per page
                                </div>
                                <div class="flex items-center gap-4 order-1 md:order-2">
                                    <span data-datatable-info="true"></span>
                                    <div class="pagination" data-datatable-pagination="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un étudiant
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    Créer un étudiant
                    <form method="POST" action="{{ route('student.store') }}">
                        @csrf
                        <x-forms.input type="text" name="name" :label="__('Nom')" required />
                        <x-forms.input type="text" name="first_name" :label="__('Prénom')" required />
                        <x-forms.input type="date" name="birth_date" :label="__('Date de naissance')" required />
                        <x-forms.input type="email" name="email" :label="__('Email')" required />
                        <x-forms.input type="password" name="password" :label="__('Mot de passe')" required />
                        <x-forms.input type="password" name="password_confirmation" :label="__('Confirmation de votre mot de passe')" required />
                        <x-forms.primary-button type="submit" class="w-full">
                            {{ __('Ajouter') }}
                        </x-forms.primary-button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>

@include('pages.students.student-modal')
