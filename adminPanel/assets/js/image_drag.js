document.querySelectorAll('.drag-drop-area').forEach(dropArea => {
    const modalId = dropArea.id.split('-')[3]; // Extract blog_id from drag-drop-area id (e.g., drag-drop-area-123 will extract 123)
    const inputFile = document.getElementById('input-file-' + modalId);
    const clearButton = document.getElementById('clear-image-btn-' + modalId);

    let dropHasOccurred = false; // Flag to track if a file has been dropped

    // Open file selector on click
    dropArea.addEventListener('click', function () {
        if (!dropHasOccurred) {
            inputFile.click();
        }
    });

    // Handle file selection
    inputFile.addEventListener('change', function () {
        const file = this.files[0];
        if (file && file.type.startsWith('image/') && file.size < 3000000) {
            createThumbnail(file, modalId);
        } else {
            alert('Must be an image and less than 3MB');
        }
    });

    // Handle drag & drop events
    dropArea.addEventListener('dragover', function (e) {
        e.preventDefault();  // Prevent default behavior (necessary for drop)
        this.style.borderStyle = 'solid';
        const h3 = this.querySelector('h3');
        h3.textContent = 'Release to upload image';
    });

    dropArea.addEventListener('dragenter', function (e) {
        e.preventDefault();
        this.style.borderStyle = 'solid';
    });

    dropArea.addEventListener('dragleave', function (e) {
        e.preventDefault();
        this.style.borderStyle = 'dashed';
        const h3 = this.querySelector('h3');
        h3.textContent = 'Drag and drop or click here to select an image';
    });

    dropArea.addEventListener('drop', function (e) {
        e.preventDefault();  // Prevent default behavior (necessary for drop)
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            inputFile.files = files;  // Assign dropped files to the file input
            const file = files[0];
            if (file && file.type.startsWith('image/') && file.size < 2000000) {
                createThumbnail(file, modalId);
                dropHasOccurred = true; // Mark that a drop has occurred
            } else {
                alert('Must be an image and less than 2MB');
            }
        }
    });

    // Function to create thumbnail
    function createThumbnail(file, modalId) {
        // Remove old images
        const dropAreaElement = document.getElementById('drag-drop-area-' + modalId);
        document.querySelectorAll('#drag-drop-area-' + modalId + ' .thumbnail-image, #drag-drop-area-' + modalId + ' .image-name').forEach(el => el.remove());

        const reader = new FileReader();
        reader.onload = () => {
            const img = document.createElement('img');
            img.src = reader.result;
            img.className = 'thumbnail-image';

            const span = document.createElement('span');
            span.className = 'image-name';
            span.textContent = file.name;

            dropAreaElement.appendChild(img);
            dropAreaElement.appendChild(span);
            dropAreaElement.style.borderColor = 'transparent';

            // Show Clear Button
            clearButton.style.display = 'inline-block';
        };

        reader.readAsDataURL(file);
    }

    // Clear button functionality (Now a link)
    clearButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the default link behavior
        const dropAreaElement = document.getElementById('drag-drop-area-' + modalId);
        document.querySelectorAll('#drag-drop-area-' + modalId + ' .thumbnail-image, #drag-drop-area-' + modalId + ' .image-name').forEach(el => el.remove());
        dropAreaElement.style.borderColor = '#ccc';
        clearButton.style.display = 'none';
        inputFile.value = ''; // Reset file input
        dropHasOccurred = false; // Reset drop state
    });
});
