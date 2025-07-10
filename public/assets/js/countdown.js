document.addEventListener('DOMContentLoaded', function () {
    initializeCountdowns();

    function initializeCountdowns() {
        const electionCards = document.querySelectorAll('.countdown_card');

        electionCards.forEach(card => {
            const dateElement = card.querySelector('.election-date');
            const countdownDisplay = card.querySelector('.countdown-display');

            if (dateElement && countdownDisplay) {
                const dateText = dateElement.textContent.trim();
                const electionDate = parseDate(dateText);

                if (electionDate) {
                    updateCountdown(electionDate, countdownDisplay);

                    setInterval(() => {
                        updateCountdown(electionDate, countdownDisplay);
                    }, 1000);
                } else {
                    console.warn("Invalid date format:", dateText);
                }
            }
        });
    }

    function parseDate(dateText) {
        // Remove ordinal suffix (1st, 2nd, 3rd, etc.)
        dateText = dateText.replace(/(\d+)(st|nd|rd|th)/gi, '$1');

        // Match "3 July 2025, 07:00pm"
        const match = dateText.match(/(\d+)\s+([A-Za-z]+)\s+(\d{4}),\s+(\d{1,2}):(\d{2})(am|pm)/i);
        if (!match) return null;

        let [ , day, monthName, year, hour, minute, period ] = match;

        hour = parseInt(hour, 10);
        minute = parseInt(minute, 10);
        if (period.toLowerCase() === 'pm' && hour !== 12) hour += 12;
        if (period.toLowerCase() === 'am' && hour === 12) hour = 0;

        const months = {
            january: 0, february: 1, march: 2, april: 3,
            may: 4, june: 5, july: 6, august: 7,
            september: 8, october: 9, november: 10, december: 11
        };

        const month = months[monthName.toLowerCase()];
        if (month === undefined) return null;

        return new Date(year, month, parseInt(day), hour, minute);
    }

    function updateCountdown(targetDate, displayElement) {
        const now = new Date();
        const diff = targetDate - now;

        const daysEl = displayElement.querySelector('.days');
        const hoursEl = displayElement.querySelector('.hours');
        const minutesEl = displayElement.querySelector('.minutes');
        const secondsEl = displayElement.querySelector('.seconds');

        if (diff <= 0) {
            daysEl.textContent = hoursEl.textContent = minutesEl.textContent = secondsEl.textContent = '00';
            return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

        daysEl.textContent = padZero(days);
        hoursEl.textContent = padZero(hours);
        minutesEl.textContent = padZero(minutes);
        secondsEl.textContent = padZero(seconds);
    }

    function padZero(num) {
        return num < 10 ? `0${num}` : `${num}`;
    }
});
