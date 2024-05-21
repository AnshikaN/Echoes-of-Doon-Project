// // Simulated events data (replace this with data fetched from the backend)
// const events = [
//     {
//         id: 1,
//         name: 'Khalanga War Memorial Heritage Walk',
//         date: '2023-01-15',
//         image: 'khalangawar.jpg'
//     },
//     {
//         id: 2,
//         name: 'Auttarayani Mela',
//         date: '2023-02-20',
//         image: 'uttarayanimela.webp'
//     },
//     // Add more event objects as needed
// ];


// async function fetchEventsFromPHP() {
//     try {
//         const response = await fetch('events2.php'); // Replace with your PHP endpoint
//         if (!response.ok) {
//             throw new Error('Network response was not ok.');
//         }

//         const eventData = await response.json();
//         return eventData; // Return the fetched data
//     } catch (error) {
//         console.error('Error fetching events:', error);
//         return []; // Return an empty array in case of an error
//     }
// }


// // Function to display events
// function displayEvents() {
//     const eventsContainer = document.getElementById('eventsContainer');
//     eventsContainer.innerHTML = '';

//     events.forEach(event => {
//         const eventBox = document.createElement('div');
//         eventBox.classList.add('event-box');

//         const image = document.createElement('img');
//         image.src = event.image;
//         image.alt = event.name;

//         const name = document.createElement('h3');
//         name.textContent = event.name;

//         const date = document.createElement('p');
//         date.textContent = event.date;

//         eventBox.appendChild(image);
//         eventBox.appendChild(name);
//         eventBox.appendChild(date);

//         eventsContainer.appendChild(eventBox);
//     });
// }

// // Function to filter events
// function filterEvents() {
//     const filterValue = document.getElementById('filterOptions').value;

//     switch (filterValue) {
//         case 'latest':
//             events.sort((a, b) => new Date(b.date) - new Date(a.date));
//             break;
//         case 'name':
//             events.sort((a, b) => a.name.localeCompare(b.name));
//             break;
//         // Add cases for more filter options
//     }

//     displayEvents();
// }

// // Initial display of events when the page loads
// displayEvents();

async function fetchEventsFromPHP() {
    try {
        const response = await fetch('events2.php'); // Replace with your PHP endpoint
        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const eventData = await response.json();
        return eventData; // Return the fetched data
    } catch (error) {
        console.error('Error fetching events:', error);
        return []; // Return an empty array in case of an error
    }
}

// Function to display events
async function displayEvents() {
    try {
        const eventsContainer = document.getElementById('eventsContainer');
        eventsContainer.innerHTML = '';

        const events = await fetchEventsFromPHP(); // Fetch events data from PHP

        events.forEach(event => {
            const eventBox = document.createElement('div');
            eventBox.classList.add('event-box');

            const image = document.createElement('img');
            image.src = event.image;
            image.alt = event.name;

            const name = document.createElement('h3');
            name.textContent = event.name;

            const date = document.createElement('p');
            date.textContent = event.date;

            eventBox.appendChild(image);
            eventBox.appendChild(name);
            eventBox.appendChild(date);

            eventsContainer.appendChild(eventBox);
        });
    } catch (error) {
        console.error('Error displaying events:', error);
    }
}

// Function to filter events
async function filterEvents() {
    try {
        const filterValue = document.getElementById('filterOptions').value;

        const events = await fetchEventsFromPHP(); // Fetch events data from PHP

        switch (filterValue) {
            case 'latest':
                events.sort((a, b) => new Date(b.date) - new Date(a.date));
                break;
            case 'name':
                events.sort((a, b) => a.name.localeCompare(b.name));
                break;
            // Add cases for more filter options
        }

        const eventsContainer = document.getElementById('eventsContainer');
        eventsContainer.innerHTML = ''; // Clear the container

        events.forEach(event => {
            const eventBox = document.createElement('div');
            eventBox.classList.add('event-box');

            const image = document.createElement('img');
            image.src = event.image;
            image.alt = event.name;

            const name = document.createElement('h3');
            name.textContent = event.name;

            const date = document.createElement('p');
            date.textContent = event.date;

            eventBox.appendChild(image);
            eventBox.appendChild(name);
            eventBox.appendChild(date);

            eventsContainer.appendChild(eventBox);
        });
    } catch (error) {
        console.error('Error filtering events:', error);
    }
}

// Initial display of events when the page loads
displayEvents();
