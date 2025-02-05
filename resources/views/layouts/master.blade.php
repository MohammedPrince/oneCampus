<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OneCampus</title>
 

  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">

  <style>
   

  </style>
</head>


<body class="light-mode">
  
  @include('layouts.header')
  
  @include('layouts.nav')

  <!-- Bottom Navigation Bar -->


  <div id="main-content" class="container-fluid" style="margin-left: 210px; width: calc(100% - 230px);">
    <div id="user-management" class="content-page" style="display: block;">

      
        
        
    @yield('content')
    
            
           
 
     
            <!-- Tab content -->
    

    </div>




  <!-- <div id="library" class="content-page" style="display: none;">
    <h1>Library</h1>
    <p>Content for Library...</p>
  </div>  -->
  </div>
  {{-- <script>
    // JavaScript to handle page navigation
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const page = this.getAttribute('data-page');
  
        // Hide all pages
        document.querySelectorAll('.page-content').forEach(content => {
          content.style.display = 'none';
        });
  
        // Show the selected page
        document.getElementById(page).style.display = 'block';
  
        // Update active class for links
        document.querySelectorAll('.nav-link').forEach(navLink => {
          navLink.classList.remove('active');
        });
        this.classList.add('active');
      });
    });
  </script> --}}

<script>
function filterTable() {
    const searchInput = document.getElementById("tableSearch").value.toLowerCase();
    const tableRows = document.querySelectorAll("#tableBody tr");

    tableRows.forEach((row) => {
      const cells = row.querySelectorAll("td");
      const rowText = Array.from(cells)
        .map((cell) => cell.textContent.toLowerCase())
        .join(" ");
      row.style.display = rowText.includes(searchInput) ? "" : "none";
    });
  }
</script>
        <script src="{{asset('js/tablefilter.js')}}" ></script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        
        <script src="{{asset('js/jquery.min.js')}}"></script>
        
        <script src="{{asset('js/navs.js')}}"></script>
        <script src="{{asset('js/pages.js')}}"></script>
        <script src="{{asset('js/theme.js')}}"></script>
        <script src="{{asset('js/formValidation.js')}}"></script>
        <script src="{{asset('js/formhandler.js')}}"></script>
        <script src="{{asset('js/jquery-3.5.1.slim.min.js')}}"></script>
        
      
      <!-- ...existing code... -->
      <script src="{{asset('js/popper.min.js')}}"></script>
      






  



<!-- ...existing code... -->
</body>
</html>
