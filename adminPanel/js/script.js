const dropArea = document.querySelector('.drop-area');
const inputFile = document.getElementById('input-file');
const clearButton = document.getElementById('clear-btn');

// Open file selector on click
dropArea.addEventListener('click', function () {
	inputFile.click();
});

// Handle file selection
inputFile.addEventListener('change', function () {
	const file = this.files[0];
	if (file && file.type.startsWith('image/') && file.size < 2000000) {
		createThumbnail(file);
	} else {
		alert('Must be an image and less than 2MB');
	}
});

// Handle drag & drop
dropArea.addEventListener('dragover', function (e) {
	e.preventDefault();
	this.style.borderStyle = 'solid';
	const h3 = this.querySelector('h3');
	h3.textContent = 'Release to upload image';
});

dropArea.addEventListener('drop', function (e) {
	e.preventDefault();
	inputFile.files = e.dataTransfer.files;
	const file = e.dataTransfer.files[0];
	if (file && file.type.startsWith('image/') && file.size < 2000000) {
		createThumbnail(file);
	} else {
		alert('Must be an image and less than 2MB');
	}
});

// Reset style when drag leaves
['dragleave', 'dragend'].forEach(event => {
	dropArea.addEventListener(event, function () {
		this.style.borderStyle = 'dashed';
		const h3 = this.querySelector('h3');
		h3.textContent = 'Drag and drop or click here to select an image';
	});
});

// Function to create thumbnail
function createThumbnail(file) {
	// Remove old images
	document.querySelectorAll('.thumbnail, .img-name').forEach(el => el.remove());

	const reader = new FileReader();
	reader.onload = () => {
		const img = document.createElement('img');
		img.src = reader.result;
		img.className = 'thumbnail';

		const span = document.createElement('span');
		span.className = 'img-name';
		span.textContent = file.name;

		dropArea.appendChild(img);
		dropArea.appendChild(span);
		dropArea.style.borderColor = 'transparent';

		// Show Clear Button
		clearButton.style.display = 'block';
	};

	reader.readAsDataURL(file);
}

// Clear button functionality
clearButton.addEventListener('click', function () {
	document.querySelectorAll('.thumbnail, .img-name').forEach(el => el.remove());
	dropArea.style.borderColor = '#ccc';
	clearButton.style.display = 'none';
	inputFile.value = ''; // Reset file input
});


// this is for the form 

document.getElementById('submission-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Collecting form data
    const formData = {
        title: document.getElementById('title').value,
        author: document.getElementById('author').value,
        category: document.getElementById('category').value,
        content: document.getElementById('content').value,
        datePublished: document.getElementById('date-published').value,
        source: document.getElementById('source').value
    };

    // Displaying data in the console (you can replace this with an API call)
    console.log('Form Data Submitted:', formData);
    
    // Clear form fields after submission
    document.getElementById('submission-form').reset();
});

// multiple images script

let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numOfFiles = document.getElementById("num-of-files");
let clearBtn = document.getElementById("clear-btn2");

clearBtn.style.display = "none"; // Hide the button initially

function preview() {
    imageContainer.innerHTML = "";
    let filesCount = fileInput.files.length;
    
    if (filesCount > 0) {
        numOfFiles.textContent = `${filesCount} File${filesCount > 1 ? "s" : ""} Selected`;
        clearBtn.style.display = "block"; // Show the button when images are added
    } else {
        numOfFiles.textContent = "No Files Chosen";
        clearBtn.style.display = "none"; // Hide the button if no files are selected
    }

    for (let i of fileInput.files) {
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        figure.appendChild(figCap);
        reader.onload = () => {
            let img = document.createElement("img");
            img.setAttribute("src", reader.result);
            figure.insertBefore(img, figCap);
        };
        imageContainer.appendChild(figure);
        reader.readAsDataURL(i);
    }
}

function clearImages() {
    fileInput.value = ""; // Reset the file input
    imageContainer.innerHTML = ""; // Clear image preview
    numOfFiles.textContent = "No Files Chosen"; // Reset file count message
    clearBtn.style.display = "none"; // Hide the clear button when images are removed
}
