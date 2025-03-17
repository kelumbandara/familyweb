let fileInputNew = document.getElementById("file-input-new");
let imageContainerNew = document.getElementById("images-new");
let numOfFilesNew = document.getElementById("num-of-files-new");
let clearBtnNew = document.getElementById("clear-btn-new");
let submitBtnNew = document.getElementById("submit-btn-new");
let optionsPanelNew = document.getElementById("options-panel-new");

const MAX_IMAGES_NEW = 5; // Maximum images allowed

function previewNew() {
    let files = fileInputNew.files;
    if (files.length > MAX_IMAGES_NEW) {
        alert(`You can only upload up to ${MAX_IMAGES_NEW} images.`);
        fileInputNew.value = "";
        return;
    }

    if (files.length > 0) {
        numOfFilesNew.textContent = `${files.length} File${files.length > 1 ? "s" : ""} Selected`;
        clearBtnNew.style.display = "block";
        submitBtnNew.style.display = "block";
        optionsPanelNew.style.display = "block";
    } else {
        numOfFilesNew.textContent = "No Files Chosen";
        clearBtnNew.style.display = "none";
        submitBtnNew.style.display = "none";
        optionsPanelNew.style.display = "none";
    }

    imageContainerNew.innerHTML = ""; // Clear previous previews

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
            imageContainerNew.appendChild(figure);
        };
        reader.readAsDataURL(file);
    }
}

function clearImagesNew() {
    fileInputNew.value = "";
    imageContainerNew.innerHTML = "";
    numOfFilesNew.textContent = "No Files Chosen";
    clearBtnNew.style.display = "none";
    submitBtnNew.style.display = "none";
    optionsPanelNew.style.display = "none";
}
