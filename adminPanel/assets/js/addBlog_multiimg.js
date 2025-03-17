let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numOfFiles = document.getElementById("num-of-files");
let clearBtn = document.getElementById("clear-btn2");

const MAX_IMAGES = 5; // Maximum images allowed

function preview() {
    let files = fileInput.files;
    if (files.length > MAX_IMAGES) {
        alert(`You can only upload up to ${MAX_IMAGES} images.`);
        fileInput.value = "";
        return;
    }

    if (files.length > 0) {
        numOfFiles.textContent = `${files.length} File${files.length > 1 ? "s" : ""} Selected`;
        clearBtn.style.display = "block";
    } else {
        numOfFiles.textContent = "No Files Chosen";
        clearBtn.style.display = "none";
    }

    imageContainer.innerHTML = ""; // Clear previous previews

    // Create image previews
    for (let file of files) {
        if (!file.type.startsWith("image/")) continue; // Skip non-image files

        let reader = new FileReader();
        reader.onload = (event) => {
            let img = document.createElement("img");
            img.setAttribute("src", event.target.result);
            img.classList.add("preview-image");
            img.style.width = "100%"; // Adjust width here
            img.style.height = "100%"; // Maintain aspect ratio

            let figure = document.createElement("figure");
            figure.appendChild(img);
            imageContainer.appendChild(figure);
        };
        reader.readAsDataURL(file);
    }
}

function clearImages() {
    fileInput.value = "";
    imageContainer.innerHTML = "";
    numOfFiles.textContent = "No Files Chosen";
    clearBtn.style.display = "none";
}

// Reset button functionality
let resetBtn = document.getElementById("clear-btn2"); // Assuming your reset button has this ID
resetBtn.addEventListener("click", function() {
    clearImages(); // Call the clearImages function to reset everything
});


