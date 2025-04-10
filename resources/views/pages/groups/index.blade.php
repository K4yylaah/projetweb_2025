<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-blue-700">
                {{ __('Groupes') }}
            </span>
        </h1>
    </x-slot>
    <div class="mt-4">
        <div class="relative">
            <input type="text" id="search" placeholder="Rechercher..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                oninput="filterOptions()" aria-label="Sélectionner un groupe" aria-describedby="search-description"
                aria-controls="group-select" aria-autocomplete="list" aria-activedescendant="group-select"
                aria-expanded="false" aria-haspopup="listbox" aria-owns="group-select" aria-required="true" />
        </div>
        <div class="mt-2">
            <select id="group-select" class="w-full px-4 py-2 border border-gray-500 rounded-md">
                <option value="" disabled selected>-- Sélectionner un groupe --</option>
                <option value="group1">L1 -- Paris</option>
                <option value="group2">L2 -- Paris</option>
                <option value="group3">L3 -- Paris</option>
                <option value="group4">L1 -- Cergy-Pontoise</option>
                <option value="group4">L2 -- Cergy-Pontoise</option>
                <option value="group4">L3 -- Cergy-Pontoise</option>
                <option value="group4">Master 1 - Pontoise</option>
                <option value="group5">Master 2 - Pontoise </option>
                <option value="group6">Master 1 - Paris</option>
                <option value="group7">Master 2 - Paris</option>
            </select>
            <div id="group-info" class="mt-4 p-4 border border-gray-300 rounded-md hidden">
                <h2 class="text-lg font-semibold text-gray-800">Informations sur le groupe</h2>
                <p id="group-details" class="text-sm text-gray-600 mt-2"></p>
            </div>



        <div class="mt-4">
            <div class="flex items-center gap-2">
                <label for="group-select" class="text-sm font-medium text-gray-700">Sélectionner un groupe</label>
            </div>

            <script>
                const groupInfo = {
                "group1": "L1 -- Paris: Ce groupe est destiné aux étudiants de première année à Paris.", Image
                "group2": "L2 -- Paris: Ce groupe est destiné aux étudiants de deuxième année à Paris.",
                "group3": "L3 -- Paris: Ce groupe est destiné aux étudiants de troisième année à Paris.",
                "group4": "L1 -- Cergy-Pontoise: Ce groupe est destiné aux étudiants de première année à Cergy-Pontoise.",
                "group5": "Master 2 - Pontoise: Ce groupe est destiné aux étudiants de Master 2 à Pontoise.",
                "group6": "Master 1 - Paris: Ce groupe est destiné aux étudiants de Master 1 à Paris.",
                "group7": "Master 2 - Paris: Ce groupe est destiné aux étudiants de Master 2 à Paris."
                };

                document.getElementById('group-select').addEventListener('change', function () {
                const selectedValue = this.value;
                const groupInfoDiv = document.getElementById('group-info');
                const groupDetails = document.getElementById('group-details');

                if (groupInfo[selectedValue]) {
                    groupDetails.textContent = groupInfo[selectedValue];
                    groupInfoDiv.classList.remove('hidden');
                } else {
                    groupInfoDiv.classList.add('hidden');
                }
                });
            </script>
            <script>
                function filterOptions() {
                    const searchInput = document.getElementById('search').value.toLowerCase();
                    const select = document.getElementById('group-select');
                    const options = select.options;

                    for (let i = 0; i < options.length; i++) {
                        const optionText = options[i].text.toLowerCase();
                        options[i].style.display = optionText.includes(searchInput) ? '' : 'none';
                    }

                    // Reset the selected option if it doesn't match the search*
                    // and if the search input is not empty
                    if (searchInput && select.selectedIndex !== -1) {
                        const selectedOptionText = options[select.selectedIndex].text.toLowerCase();
                        if (!selectedOptionText.includes(searchInput)) {
                            select.selectedIndex = -1;
                        }
                    }
                    if (searchInput) {
                        let found = false;
                        for (let i = 0; i < options.length; i++) {
                            if (options[i].style.display !== 'none') {
                                select.selectedIndex = i;
                                found = true;
                                break;
                            }
                        }
                        if (!found) {
                            select.selectedIndex = -1;
                        }
                    } else {
                        select.selectedIndex = 0;
                    }
                }
            </script>

        </div>
        <script src="{{ asset(jsa)}}"></script>
</x-app-layout>
