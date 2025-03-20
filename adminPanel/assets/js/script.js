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
	if (file && file.type.startsWith('image/') && file.size < 3000000) {
		createThumbnail(file);
	} else {
		alert('Must be an image and less than 3MB');
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
	if (file && file.type.startsWith('image/') && file.size < 3000000) {
		createThumbnail(file);
	} else {
		alert('Must be an image and less than 3MB');
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







