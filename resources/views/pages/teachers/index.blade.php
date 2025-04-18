<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Enseignants') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Liste des enseignants</h3>
                        <div class="input input-sm max-w-48">
                            <i class="ki-filled ki-magnifier"></i>
                            <input placeholder="Rechercher un enseignant" type="text" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                @php
                                    $teachers = \App\Models\UserSchool::where('role', 'teacher')->get();
                                @endphp
                                @foreach ($teachers as $teacher)
                                    <table class="table table-border" data-datatable-table="true">
                                        <thead>
                                            <tr>
                                                <th class="min-w-[135px]">
                                                    <span class="sort asc">
                                                        <span class="sort-label">Nom</span>
                                                        <span class="sort-icon"></span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[135px]">
                                                    <span class="sort">
                                                        <span class="sort-label">Prénom</span>
                                                        <span class="sort-icon"></span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[135px]">
                                                    <span class="sort">
                                                        <span class="sort-label">Date d'anniversaire</span>
                                                        <span class="sort-icon"></span>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $teacher->first_name }}</td>
                                                <td>{{ $teacher->last_name }}</td>
                                                <td>{{ $teacher->birth_date }}</td>
                                                <td>
                                                    <div class="flex items-center justify-between">
                                                        <a href="#">
                                                            <i class="text-success ki-filled ki-shield-tick"></i>
                                                        </a>

                                                        <a class="hover:text-primary cursor-pointer" href="#teacher-modal"
                                                            data-modal-toggle="#teacher-modal">
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
                        Ajouter un Enseignant
                    </h3>
                </div>
                <div class="card-body">
                    <div class="flex gap-5">
                        <form action="{{ route('teacher.create') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <label for="first_name">Prénom</label>
                                    <input type="text" name="first_name" id="first_name" required class="w-full">
                                </div>
                                <div>
                                    <label for="last_name">Nom</label>
                                    <input type="text" name="last_name" id="last_name" required class="w-full">
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="last_name" required class="w-full">
                                </div>
                                <div>
                                    <label for="password">Mot de passe</label>
                                    <input type="password" name="password" id="last_name" required class="w-full">
                                </div>

                                <div>
                                    <label for="birth_date">Date d'anniversaire</label>
                                    <input type="date" name="birth_date" id="birth_date" required class="w-full">
                                </div>

                                <select name="school_id" required>
                                    @php
                                        $schools = \App\Models\School::all();
                                    @endphp
                                    <option value="" disabled selected>Choisir une école</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Ajouter</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>

@include('pages.teachers.teacher-modal')
