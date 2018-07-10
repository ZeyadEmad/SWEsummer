var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("Slides"); // getting the element
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; // hides image of class Slides
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} // comparing length of Slides with the index
    x[slideIndex-1].style.display = "block"; // displaying fucntion
    setTimeout(carousel, 2000); // every 2 seconds ya shabab
}

