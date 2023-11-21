$(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if (
      $(this)
        .parent()
        .hasClass("active")
    ) {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .parent()
        .removeClass("active");
    } else {
      $(".sidebar-dropdown").removeClass("active");
      $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
      $(this)
        .parent()
        .addClass("active");
    }
  });
  

  
  $("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });


      // Find the .floating element and the sidebar
      const floatingElement = document.querySelector(".floating");
      const sidebar = document.querySelector(".page-wrapper");
      var myImage = document.getElementById("myImage");
  
      // Function to toggle the width of the floating element
      function toggleWidth() {
        if (sidebar.classList.contains("toggled")) {
          floatingElement.style.width = "calc(100% - 260px)";
          floatingElement.style.transition = "width 0.2s, transform 0.5s";
          myImage.style.display = "none";
        } else {
          floatingElement.style.width = "100%";
          floatingElement.style.transition = "width 0.2s, transform 0.5s";
          myImage.style.display = "block";
        }
      }
  
      // Add a click event listener to the #show-sidebar button
      $("#show-sidebar").click(function() {
        sidebar.classList.add("toggled");
        toggleWidth(); // Toggle the width when the sidebar is shown
      });
  
      // Add a click event listener to the #close-sidebar button
      $("#close-sidebar").click(function() {
        sidebar.classList.remove("toggled");
        toggleWidth(); // Toggle the width when the sidebar is hidden
      });
  
      // Initial width adjustment
      toggleWidth();