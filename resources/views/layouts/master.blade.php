<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fu System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/campuslogin.css">
  <style>

  </style>
</head>

<body>
  
   
        <picture>
          <source srcset="assets/logowithname.svg" type="image/svg+xml">
          <img src="assets/logowithname.svg" class="logo" alt="logo" draggable="false">
        </picture>
      
        <!-- Top-left image -->
      
        <img src="assets/bottomleft.svg" class="bottom-left" alt="bottomleft" draggable="false">
      
      
        <!-- Bottom-right image -->
      
        <img src="assets/topright.svg" class="top-right" alt="topright" draggable="false">
      
        <!-- Form Container -->
      
        <div class="container col-12" style="flex-direction: row;">
          <div class="row g-0 col-12">
            <div class="left-form col-4 p-4 align-content-center">
              <div class="row" style="justify-content: end;align-items: end;align-self: flex-end;">
                <div class="radio-dropdown">
                  <i class="bi bi-globe" style="font-size: 0.9rem;color: #6C3A30;"></i>
                  <div class="dropdown-menu">
                    <div class="radio-item">
                      <input type="radio" id="english" name="language" value="en" class="radio-input" checked>
                      <label for="english" class="radio-label small" data-i18n="english">English
                        <span class="radio-circle"></span>
                      </label>
                    </div>
                    <div class="radio-item">
                      <input type="radio" id="arabic" name="language" value="ar" class="radio-input">
                      <label for="arabic" class="radio-label small" data-i18n="arabic">Arabic
                        <span class="radio-circle"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              @yield('content')
      
    <script src="js/localization.js"></script>
    <script src="js/cardflip.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
