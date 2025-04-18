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
                            Mes promotions
                        </h3>
                    </div>
                    @php
                        $promotions = \App\Models\Cohort::all();
                    @endphp

                    <div class="card-body flex flex-col gap-5">
                        @foreach ($promotions as $promotion)
                            <div class="flex flex-col gap-2">
                                <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                    href="{{ route('cohort.show', $promotion->id) }}">
                                    {{ $promotion->name }}
                                </a>
                                <span class="text-2sm text-gray-700 font-normal leading-3">
                                    {{ $promotion->start_year }} - {{ $promotion->end_year }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="card card-grid h-full min-w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Bilan de compétences
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
