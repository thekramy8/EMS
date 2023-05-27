<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <link rel="stylesheet" href="./vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/fontawesome/fontawesome.css">
    <link rel="stylesheet" href="./src/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
   <link rel="stylesheet" href="./vendor/datatable/jquery.dataTables.min.css">
   <script src="./vendor/js/jquery.dataTables.min.js"></script>
   
    <title>BONGALON LAW FIRM</title>
</head>
<body>

        <?php
           
            include 'navbar.php';
        ?>

  
    <main id="content">
    <div class="row p-3 m-3"id="loadContent"> 
   
   
    </div>

    </div>
 
    </main>
 
   <script src="./vendor/js/bootstrap.bundle.min.js" type="text/javascript"></script>
   
 

 

    <script>
    $(document).ready(function() {
    var currentUrl = window.location.href; // Get the current page URL

    $('nav a').each(function() {
        var linkUrl = $(this).attr('href');
        if (currentUrl.indexOf(linkUrl) > -1) {
            $(this).addClass('selected');
        }
    });

    // Set the default page and add 'selected' class
    var defaultPage = 'home'; // Change 'home' to the desired default page
    $('nav a[data-page="' + defaultPage + '"]').addClass('selected');
    loadContent(defaultPage);

    $('nav a').click(function(e) {
        e.preventDefault();
        $('nav a').removeClass('selected');
        $(this).addClass('selected');
        var page = $(this).data('page');
        loadContent(page);
    });

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
});

    </script> 
    <script>
  function redirectToPage(pageUrl) {
    window.location.href = pageUrl;
  }
</script>
  
</body> 

</html>
