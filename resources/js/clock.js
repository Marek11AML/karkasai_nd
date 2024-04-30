import moment from 'moment';

document.addEventListener("DOMContentLoaded", function() {
    // Function to update the clock every second
    function updateClock() {
        var currentDateTime = moment().format('YYYY-MM-DD h:mm:ss A');
        document.getElementById('current-time').innerText = currentDateTime;
    }

    // Check if the clock element exists on the current page
    var clockElement = document.getElementById('current-time');
    if (clockElement) {
        updateClock();
        setInterval(updateClock, 1000);
    }
});