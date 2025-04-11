const groupInfo = {
    "group1": "L1 -- Paris: Ce groupe est destiné aux étudiants de première année à Paris." + "\n",
    "group2": "L2 -- Paris: Ce groupe est destiné aux étudiants de deuxième année à Paris." + "\n",
    "group3": "L3 -- Paris: Ce groupe est destiné aux étudiants de troisième année à Paris." + "\n",
    "group4": "L1 -- Cergy-Pontoise: Ce groupe est destiné aux étudiants de première année à Cergy-Pontoise." + "\n",
    "group5": "L2 -- Cergy-Pontoise: Ce groupe est destiné aux étudiants de deuxième année à Cergy-Pontoise." + "\n",
    "group6": "L3 -- Cergy-Pontoise: Ce groupe est destiné aux étudiants de troisième année à Cergy-Pontoise." + "\n",
    "group7": "Master 1 - Pontoise: Ce groupe est destiné aux étudiants de Master 1 à Pontoise." + "\n",
    "group8": "Master 2 - Pontoise: Ce groupe est destiné aux étudiants de Master 2 à Pontoise." + "\n",
    "group9": "Master 1 - Paris: Ce groupe est destiné aux étudiants de Master 1 à Paris." + "\n",
    "group10": "Master 2 - Paris: Ce groupe est destiné aux étudiants de Master 2 à Paris." + "\n"
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