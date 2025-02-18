const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const arrowBtns = document.querySelectorAll(".wrapper i");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const carouselChilderns = [...carousel.children];

let isDragging = false, startX, startScrollLeft, timeOutId;

// Get The number of the cards that can fit in the carousel at once
let cardPriView = Math.round(carousel.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to begging of carousel for infinit scrolling 
carouselChilderns.slice(-cardPriView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("afterBegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChilderns.slice(0, cardPriView).forEach(card => {
    carousel.insertAdjacentHTML("beforeEnd", card.outerHTML);
});



//  Add event listners for  the arrow buttons to scroll  the carousel left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id === "left" ? - firstCardWidth : firstCardWidth;
    })

});


const dragStrat = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}


const dragging = (e) => {
    if (!isDragging) return; // if is Dragging is false return from here
    // Update the Scroll positions of the carousel based on the cursor movement
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);

}

const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}

const autoPlay = () =>{
    if(!window.innerWidth < 1500) return;
    timeOutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 1500);
}
autoPlay();

const infinitScroll = () => {
    if(carousel.scrollLeft === 0){
       carousel.classList.add("no-transition");
       carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
       carousel.classList.remove("no-transition");
    }else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth){
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }
    clearTimeout(timeOutId);
    if(!wrapper.matches(":hover")) autoPlay();
}

carousel.addEventListener("mousedown", dragStrat);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infinitScroll);



