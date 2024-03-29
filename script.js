// ScrollReveal({
//     reset:true,
//     distance: '60px',
//     duration: 2500,
//     delay: 400
// });

// ScrollReveal().reveal('.main-title, .section-title, .section-title-2', {delay: 500, origin: 'left'});
// ScrollReveal().reveal('#cont-text:not(.container-cards)', {delay: 150, origin: 'bottom'});
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






// ADMIN JAVASCRIPT //
const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");
let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}
let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}
modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});
sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})








const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");
form.onsubmit = (e)=>{
  e.preventDefault();
  statusTxt.style.color = "#0D6EFD";
  statusTxt.style.display = "block";
  statusTxt.innerText = "Sending your message...";
  form.classList.add("disabled");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState == 4 && xhr.status == 200){
      let response = xhr.response;
      if(response.indexOf("required") != -1 || response.indexOf("valid") != -1 || response.indexOf("failed") != -1){
        statusTxt.style.color = "red";
      }else{
        form.reset();
        setTimeout(()=>{
          statusTxt.style.display = "none";
        }, 3000);
      }
      statusTxt.innerText = response;
      form.classList.remove("disabled");
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}