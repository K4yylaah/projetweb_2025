<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Promotions') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Mes promotions</h3>
                    </div>
                    @php
                        $promotions = \App\Models\Cohort::all();
                    @endphp
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                <table class="table table-border" data-datatable-table="true">
                                    <thead>
                                        <tr>
                                            <th class="min-w-[160px]">
                                                <span class="sort asc">
                                                    <span class="sort-label">Nom de la Promotion</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[160px]">
                                                <span class="sort">
                                                    <span class="sort-label">Date de début</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[160px]">
                                                <span class="sort">
                                                    <span class="sort-label">Date de fin</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[155px]">
                                                <span class="sort">
                                                    <span class="sort-label">Modifier</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                            <th class="min-w-[155px]">
                                                <span class="sort">
                                                    <span class="sort-label">Supprimer</span>
                                                    <span class="sort-icon"></span>
                                                </span>
                                            </th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $promotions = \App\Models\Cohort::all();
                                        @endphp
                                        @foreach ($promotions as $promotion)
                                            <tr>
                                                <td>
                                                    <div class="flex flex-col gap-2">
                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                            href="{{ route('cohort.show', $promotion->id) }}">
                                                            {{ $promotion->name }}
                                                        </a>
                                                        <span class="text-2sm text-gray-700 font-normal leading-3">
                                                            {{ $promotion->description }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>{{ $promotion->start_date }}</td>
                                                <td>{{ $promotion->end_date }}</td>
                                                <td class="cursor-pointer pointer">
                                                    <form action="{{ route('cohort.update', $promotion->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="text-green-500 hover:text-green-700">
                                                            {{ __('Modifier') }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="cursor-pointer pointer">
                                                    <form action="{{ route('cohort.destroy', $promotion->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                                            {{ __('Supprimer') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
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
                    Ajouter une promotion
                </h3>
            </div>
            <form action="{{ route('cohort.store') }}" method="post"></form>
            <div class="card-body flex flex-col gap-5">
                <form action="{{ route('cohort.store') }}" method="post">
                    @csrf
                    <div class="card-body flex flex-col gap-5">
                        <x-forms.input type="text" name="name" :label="__('Nom')" required />

                        <x-forms.input type="text" name="description" :label="__('Description')" />

                        <x-forms.input type="date" name="start_date" :label="__('Début de l\'année')" placeholder="" required />

                        <x-forms.input type="date" name="end_date" :label="__('Fin de l\'année')" placeholder="" required />

                        <select name="school_id" required>
                            @php
                                $schools = \App\Models\School::all();
                            @endphp
                            <option value="" disabled selected>Choisir une école</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>

                        <x-forms.primary-button type="submit">
                            {{ __('Valider') }}
                        </x-forms.primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
