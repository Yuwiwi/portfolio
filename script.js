ScrollReveal({
    reset:true,
    distance: '60px',
    duration: 2500,
    delay: 400
});

// ScrollReveal().reveal('.main-title, .section-title, .section-title-2', {delay: 500, origin: 'left'});
ScrollReveal().reveal('#cont-text:not(.container-cards)', {delay: 150, origin: 'bottom'});
// ScrollReveal().reveal('.info', {delay: 700, origin: 'left'});



// CV DOWNLOAD BUTTON ---------------------
document.getElementById("downloadBtn").addEventListener("click", function() {
  var link = document.createElement("a");
  link.href = "./assets/Yuri - RESUME.pdf";
  link.download = "Yuri's Resume";
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
});




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









  document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.getElementById('contactForm');
    const responseContainer = document.getElementById('response');
  
    contactForm.addEventListener('submit', function (event) {
      event.preventDefault();
      const formData = new FormData(contactForm);
  
      fetch('/submit_message', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          responseContainer.innerHTML = '<p class="success">Message sent successfully!</p>';
          contactForm.reset();
        } else {
          responseContainer.innerHTML = '<p class="error">An error occurred. Please try again later.</p>';
        }
      })
      .catch(error => {
        responseContainer.innerHTML = '<p class="error">An error occurred. Please try again later.</p>';
      });
    });
  });





  

  var modal = document.getElementById("myModal");

// Get the arrow
var arrow = document.createElement("span");
arrow.className = "arrow";
arrow.innerHTML = "&#10132;"; // Unicode for right arrow

// Append arrow to the paragraph
document.getElementById("cont-text").appendChild(arrow);

// When the user clicks on the arrow, open the modal
arrow.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}