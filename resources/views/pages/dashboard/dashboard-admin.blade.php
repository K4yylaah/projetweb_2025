<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Étudiants
                        </h3>
                    </div>
                    <table>
                        <thead class="card-header flex items-center justify-between bg-white border-gray-200">
                            <h3>Listes des étudiants</h3>
                        </thead>
                        <tr data-datatable="true" data-datatable-page-size="5">
                        
                        <td>
                            
                        </td>
                        <td>
                            <div class="input input-sm max-w-48">
                                <i class="ki-filled ki-magnifier"></i>
                                <input placeholder="Rechercher un étudiant" type="text" />
                            </div>
                        </td>
                        <td>
                            <div>
                                <a href="{{ route('student.index') }}" class="btn btn-primary">
                                    Ajouter un étudiant
                                </a>
                            </div>
                        </td>
                        </tr>
                        </thead>
                    </table>
                    <div class="card-body flex flex-col gap-5">
                        @php
                            $students = \App\Models\UserSchool::where('role', 'student')->get();
                        @endphp
                        <pre dd{{ $students }}></pre>
                        @if ($students->isEmpty())
                            <p class="text-purple-700">Aucun étudiant trouvé.</p>
                        @endif
                        @foreach ($students as $student)
                            <table>
                                <tr>
                                    <td>
                                        <div class="flex flex-col gap-2">
                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                href="{{ route('student.index') }}">
                                                {{ $student->name }}
                                            </a>
                                            <span class="text-2sm text-gray-700 font-normal leading-3">
                                                {{ $student->email }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $student->phone }}</td>
                                </tr>
                            </table>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="card card-grid h-full min-w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Enseignants
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    @php
                        $teachers = \App\Models\UserSchool::where('role', 'teacher')->get();
                    @endphp
                    @foreach ($teachers as $teacher)
                        <table>
                            <tr>
                                <td>
                                    <div class="flex flex-col gap-2">
                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                            href="{{ route('teacher.index') }}">
                                            {{ $teacher->name }}
                                        </a>
                                        <span class="text-2sm text-gray-700 font-normal leading-3">
                                            {{ $teacher->email }}
                                        </span>
                                    </div>
                                </td>
                                <td>{{ $teacher->phone }}</td>
                            </tr>
                        </table>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card card-grid h-full min-w-full">
            <div class="card-header">
                <h3 class="card-title">
                    Promotions
                </h3>
            </div>
            <div class="card-body flex flex-col gap-5">
                @php
                    $promotions = \App\Models\Cohort::all();
                @endphp
                @foreach ($promotions as $promotion)
                    <table>
                        <tr>
                            <td>
                                <div class="flex flex-col gap-2">
                                    <h1>Nom de la promotion</h1>
                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                        href="{{ route('cohort.show', $promotion->id) }}">
                                        {{ $promotion->name }}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="flex flex-col gap-2">
                                    <h1>Description</h1>
                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary">
                                        {{ $promotion->description }}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="flex flex-col gap-2">
                                    <h1>Date de début</h1>
                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary">
                                        {{ $promotion->start_date }}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="flex flex-col gap-2">
                                    <h1>Date de fin</h1>
                                    <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary">
                                        {{ $promotion->end_date }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <hr>
                    </table>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
