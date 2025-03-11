let fileInput = document.getElementById("file-input");
    let imageContainer = document.getElementById("images");
    let numOfFiles = document.getElementById("num-of-files");
    let clearBtn = document.getElementById("clear-btn2");
    let submitBtn = document.getElementById("submit-btn");
    let optionsPanel = document.getElementById("options-panel");

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
            submitBtn.style.display = "block";
            optionsPanel.style.display = "block";
        } else {
            numOfFiles.textContent = "No Files Chosen";
            clearBtn.style.display = "none";
            submitBtn.style.display = "none";
            optionsPanel.style.display = "none";
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
        fileInput.value = "";
        imageContainer.innerHTML = "";
        numOfFiles.textContent = "No Files Chosen";
        clearBtn.style.display = "none";
        submitBtn.style.display = "none";
        optionsPanel.style.display = "none";
    }