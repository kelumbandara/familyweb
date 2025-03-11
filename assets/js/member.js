const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const arrowBtns = document.querySelectorAll(".wrapper i");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
let cardPriView;
let isDragging = false, startX, startScrollLeft, timeOutId;

// Calculate number of visible cards based on the screen size
const setCardPreview = () => {
    const carouselWidth = carousel.offsetWidth;
    cardPriView = Math.round(carouselWidth / firstCardWidth);
    if (carouselWidth < 1000) {
        autoPlay(); // Start auto-play for smaller screens
    }
};

// Insert copies of the last and first cards for infinite scroll
const setupCarousel = () => {
    const carouselChilderns = [...carousel.children];
    
    carouselChilderns.slice(-cardPriView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterBegin", card.outerHTML);
    });

    carouselChilderns.slice(0, cardPriView).forEach(card => {
        carousel.insertAdjacentHTML("beforeEnd", card.outerHTML);
    });
};

// Arrow button event listeners for scrolling
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id === "left" ? - firstCardWidth : firstCardWidth;
    });
});

// Start drag event
const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
};

// Dragging functionality
const dragging = (e) => {
    if (!isDragging) return;
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
};

// Stop dragging functionality
const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
};

// Auto-play functionality
const autoPlay = () => {
    timeOutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 1500);
};

// Infinite scroll functionality
const infinitScroll = () => {
    if(carousel.scrollLeft === 0){
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
    } else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth){
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }

    clearTimeout(timeOutId);
    if (!wrapper.matches(":hover")) autoPlay();
};

// Event listeners for dragging
carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infinitScroll);

// Initialize the carousel on page load and window resize
window.addEventListener('resize', () => {
    setCardPreview();
    setupCarousel();
});
setCardPreview();
setupCarousel();
