document.addEventListener("DOMContentLoaded", function () {
    let loadMoreBtn = document.querySelector('#load-more');
    let showLessBtn = document.createElement('div'); // Create "Show Less" button
    showLessBtn.id = "show-less";
    showLessBtn.innerText = "Show Less";
    showLessBtn.style.display = 'none'; // Initially hidden
    showLessBtn.style.cursor = "pointer";
    showLessBtn.style.padding = "10px 20px";
    showLessBtn.style.background = "#333";
    showLessBtn.style.color = "white";
    showLessBtn.style.textAlign = "center";
    showLessBtn.style.margin = "20px auto";
    showLessBtn.style.width = "fit-content";
    showLessBtn.style.borderRadius = "5px";

    let container = document.querySelector('.container');
    container.appendChild(showLessBtn); // Add the button to the container

    let boxes = [...document.querySelectorAll('.container .box-container .box')];
    let currentItem = 3;

    // Show "Load More" button only if there are more than 3 cards
    if (boxes.length > 3) {
        loadMoreBtn.style.display = 'block';
    }

    // Load More Functionality
    loadMoreBtn.onclick = () => {
        for (let i = currentItem; i < currentItem + 3; i++) {
            if (boxes[i]) {
                boxes[i].style.display = 'inline-block'; // Show next boxes
            }
        }
        currentItem += 3;

        if (currentItem >= boxes.length) {
            loadMoreBtn.style.display = 'none';
        }
        
        showLessBtn.style.display = 'block'; // Show the "Show Less" button
    };

    // Show Less Functionality
    showLessBtn.onclick = () => {
        boxes.forEach((box, index) => {
            if (index >= 3) {
                box.style.display = 'none'; // Hide all except the first 3
            }
        });

        currentItem = 3;
        loadMoreBtn.style.display = 'block'; // Bring back "Load More"
        showLessBtn.style.display = 'none'; // Hide "Show Less"
    };
});
