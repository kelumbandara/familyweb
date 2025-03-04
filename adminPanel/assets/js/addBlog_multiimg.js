let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numOfFiles = document.getElementById("num-of-files");
let clearBtn = document.getElementById("clear-btn2");

clearBtn.style.display = "none"; // Hide the button initially

function preview() {
    let files = fileInput.files;
    let filesCount = files.length;

    if (filesCount > 0) {
        numOfFiles.textContent = `${filesCount} File${filesCount > 1 ? "s" : ""} Selected`;
        clearBtn.style.display = "block"; // Show the button when images are added
    } else {
        numOfFiles.textContent = "No Files Chosen";
        clearBtn.style.display = "none"; // Hide the button if no files are selected
    }

    imageContainer.innerHTML = ""; // Clear previous previews

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
}
