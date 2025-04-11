function filterOptions() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const select = document.getElementById('group-select');
    const options = select.options;

    for (let i = 0; i < options.length; i++) {
        const optionText = options[i].text.toLowerCase();
        options[i].style.display = optionText.includes(searchInput) ? '' : 'none';
    }

    // Reset the selected option if it doesn't match the search input
    // and if the search input is not empty
    if (searchInput && select.selectedIndex !== -1) {
        const selectedOptionText = options[select.selectedIndex].text.toLowerCase();
        if (!selectedOptionText.includes(searchInput)) {
            select.selectedIndex = -1;
        }
    }
    // If the search input is empty, select the first option
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