alert('heeeeeeeeey');

// Get the container element
var ulContainer = document.getElementById("myUl");

// Get all buttons with class="btn" inside the container
var tabs = $(" #myUl .nav-item");
    
    console.log(tabs);

// Loop through the buttons and add the active class to the current/clicked button
  tabs.on("click", function() {
    this.addClass('active').siblings.removeClass('active');

}     