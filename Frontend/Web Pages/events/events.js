function filterEvents() {
    const filterValue = document.getElementById('filterOptions').value;
    const eventBoxes = document.querySelectorAll('.box');

    switch (filterValue) {
        case 'latest':
            sortEventsByLatest(eventBoxes);
            break;
        case 'name':
            sortEventsByName(eventBoxes);
            break;
        // Add cases for more filter options
        default:
            break;
    }
}

function sortEventsByLatest(boxes) {
    const sortedBoxes = Array.from(boxes).sort((a, b) => {
        return new Date(b.dataset.date) - new Date(a.dataset.date);
    });

    rearrangeEventBoxes(sortedBoxes);
}

function sortEventsByName(boxes) {
    const sortedBoxes = Array.from(boxes).sort((a, b) => {
        const nameA = a.querySelector('h3').textContent.toLowerCase();
        const nameB = b.querySelector('h3').textContent.toLowerCase();
        return nameA.localeCompare(nameB);
    });

    rearrangeEventBoxes(sortedBoxes);
}

function rearrangeEventBoxes(boxes) {
    const rightContainer = document.querySelector('.rightcontainer');
    rightContainer.innerHTML = '';

    boxes.forEach(box => {
        rightContainer.appendChild(box);
    });
}
