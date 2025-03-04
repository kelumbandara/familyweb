let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numOfFiles = document.getElementById("num-of-files");
let clearBtn = document.getElementById("clear-btn2");
let submitBtn = document.getElementById("submit-btn");

const MAX_IMAGES = 5; // Set the maximum number of images

clearBtn.style.display = "none"; // Hide the button initially
submitBtn.style.display = "none"; // Hide submit button initially

function preview() {
    let files = fileInput.files;
    let filesCount = files.length;

    // If more than 5 files are selected, show an alert and limit to 5 files
    if (filesCount > MAX_IMAGES) {
        alert(`You can only upload a maximum of ${MAX_IMAGES} images.`);
        // Slice the files to only include the first 5 files
        files = Array.from(files).slice(0, MAX_IMAGES);
        // Update the file input with the new files list
        fileInput.files = new FileListItems(files);
    }

    // Update the display based on the number of files selected
    if (files.length > 0) {
        numOfFiles.textContent = `${files.length} File${files.length > 1 ? "s" : ""} Selected`;
        clearBtn.style.display = "block"; // Show the button when images are added
        submitBtn.style.display = "block"; // Show submit button when images are added
    } else {
        numOfFiles.textContent = "No Files Chosen";
        clearBtn.style.display = "none"; // Hide the button if no files are selected
        submitBtn.style.display = "none"; // Hide submit button if no files are selected
    }

    imageContainer.innerHTML = ''; // Clear previous previews

    // Create image previews for each selected file
    for (let file of files) {
        if (!file.type.startsWith("image/")) continue; // Skip non-image files

        let reader = new FileReader();
        reader.onload = (event) => {
            let img = document.createElement("img");
            img.setAttribute("src", event.target.result);
            img.classList.add("preview-image");

            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.textContent = file.name;

            figure.appendChild(img);
            figure.appendChild(figCap);
            imageContainer.appendChild(figure);
        };
        reader.readAsDataURL(file);
    }
}

function clearImages() {
    fileInput.value = ""; // Reset input
    imageContainer.innerHTML = ""; // Clear all images in the preview
    numOfFiles.textContent = "No Files Chosen"; // Reset file count text
    clearBtn.style.display = "none"; // Hide clear button
    submitBtn.style.display = "none"; // Hide submit button
}

// Helper function to create a FileList from an array of File objects
function FileListItems(files) {
    let b = files.length;
    let d = new ClipboardEvent('').clipboardData || new DataTransfer();
    for (let i = 0; i < b; i++) d.items.add(files[i]);
    return d.files;
}