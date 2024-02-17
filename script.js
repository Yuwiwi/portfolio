ScrollReveal({
    reset:true,
    distance: '60px',
    duration: 2500,
    delay: 400
});

ScrollReveal().reveal('.main-title, .section-title, .section-title-2', {delay: 500, origin: 'left'});
ScrollReveal().reveal('.content-2', {delay: 500, origin: 'left'});
ScrollReveal().reveal('.info', {delay: 700, origin: 'left'});







// document.addEventListener("DOMContentLoaded", function() {
//     const cardContainer = document.querySelector('.scrollable-container');
  
//     // Function to scroll the container
//     function autoScroll() {
//       cardContainer.scrollTop += 1; // Adjust scrolling speed as needed
//     }
  
//     // Start auto-scrolling
//     let scrollInterval = setInterval(autoScroll, 50); // Adjust interval as needed
  
//     // Event listener for when the container is hovered over
//     cardContainer.addEventListener('mouseenter', function() {
//       clearInterval(scrollInterval); // Stop auto-scrolling
//     });
  
//     // Event listener for when the container is not hovered over
//     cardContainer.addEventListener('mouseleave', function() {
//       scrollInterval = setInterval(autoScroll, 50); // Restart auto-scrolling
//     });
//   });



document.addEventListener("DOMContentLoaded", function() {
    const cardContainer = document.getElementById('scrollable-container');
    const cardsContainer = document.getElementById('card-container');
  
    // Function to scroll the container
    function autoScroll() {
      cardContainer.scrollTop += 1; // Adjust scrolling speed as needed
      if (cardContainer.scrollTop >= cardsContainer.offsetHeight - cardContainer.offsetHeight) {
        cardContainer.scrollTop = 0;
      }
    }
  
    // Start auto-scrolling
    let scrollInterval = setInterval(autoScroll, 50); // Adjust interval as needed
  
    // Event listener for when the container is hovered over
    cardContainer.addEventListener('mouseenter', function() {
      clearInterval(scrollInterval); // Stop auto-scrolling
    });
  
    // Event listener for when the container is not hovered over
    cardContainer.addEventListener('mouseleave', function() {
      scrollInterval = setInterval(autoScroll, 50); // Restart auto-scrolling
    });
  });