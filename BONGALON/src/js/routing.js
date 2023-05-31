

function loadContent(page) {
    $.ajax({
        url: page + '.php',
        type: 'GET',
        success: function(response) {
            $('#loadContent').html(response);
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
} 

// Timer interval in milliseconds (e.g., refresh every 5 seconds)
var refreshInterval = 5000;

// Function to refresh and load content
function refreshAndLoadContent() {
    loadContent(page); // Replace 'your_page_name' with the desired page name
}

// Start the timer
var timer = setInterval(refreshAndLoadContent, refreshInterval);
