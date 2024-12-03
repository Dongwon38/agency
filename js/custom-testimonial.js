// Select DOM elements
const testimonialSection = document.querySelector(".ws-testimonial-section"); // Section containing the testimonials
const container = document.querySelector(".testimonial-container"); // The main container holding all testimonials
const testimonials = Array.from(document.querySelectorAll(".testimonial")); // Array of individual testimonial elements
const prevButton = document.querySelector(".prev"); // Button to navigate to the previous slide
const nextButton = document.querySelector(".next"); // Button to navigate to the next slide

let slidesPerView = calculateSlidesPerView(); // Number of slides visible at a time, calculated based on screen width
let index = 0; // Current slide index
let autoSlideInterval; // Variable to store the auto-slide interval ID

// Calculate the number of slides to display based on the screen width
function calculateSlidesPerView() {
  const screenWidth = window.innerWidth; // Get the width of the browser window
  // Return slides per view based on breakpoints
  const slides = screenWidth >= 1200 ? 3 : screenWidth >= 768 ? 2 : 1;
  return slides;
}

// Update the slider to reflect the current state (e.g., position, slide sizes)
function updateSlider() {
  slidesPerView = calculateSlidesPerView(); // Recalculate slides per view on update

  // Calculate the maximum index the slider can reach
  const maxIndex =
    slidesPerView === 1
      ? Math.max(0, Math.ceil(testimonials.length / slidesPerView)) - 1
      : Math.max(0, Math.ceil(testimonials.length / slidesPerView));

  // Ensure the current index is within the valid range
  index = Math.min(index, maxIndex);

  // Move the slider by calculating the offset in percentage
  const offset = -((index * 100) / slidesPerView);
  container.style.transform = `translateX(${offset}%)`;

  // Adjust the size of each testimonial to fit within the calculated slides per view
  testimonials.forEach((testimonial) => {
    testimonial.style.flex = `0 0 ${100 / slidesPerView}%`;
  });
}

// Navigate to the next slide
function nextSlide() {
  const maxIndex =
    slidesPerView === 1
      ? Math.ceil(testimonials.length / slidesPerView) - 1
      : Math.ceil(testimonials.length / slidesPerView);
  index = (index + 1) % (maxIndex + 1); // Loop back to the beginning if the last slide is reached
  updateSlider(); // Update the slider to reflect the new index
}

// Navigate to the previous slide
function prevSlide() {
  const maxIndex =
    slidesPerView === 1
      ? Math.ceil(testimonials.length / slidesPerView) - 1
      : Math.ceil(testimonials.length / slidesPerView);
  index = (index - 1 + maxIndex + 1) % (maxIndex + 1); // Loop to the end if the first slide is reached
  updateSlider(); // Update the slider to reflect the new index
}

// Start the auto-slide functionality (slides change every 10 seconds)
function startAutoSlide() {
  stopAutoSlide();
  autoSlideInterval = setInterval(nextSlide, 10000);
}

// Stop the auto-slide functionality
function stopAutoSlide() {
  clearInterval(autoSlideInterval);
}
// Initialize all event listeners for the slider
function initEventListeners() {
  // Debounce resize event to prevent excessive updates
  const debouncedResize = debounce(() => {
    updateSlider();
  }, 200);

  window.addEventListener("resize", debouncedResize); // Adjust slider on window resize

  nextButton.addEventListener("click", () => {
    stopAutoSlide(); // Pause auto-slide when navigating manually
    nextSlide(); // Navigate to the next slide
    startAutoSlide(); // Resume auto-slide
  });

  prevButton.addEventListener("click", () => {
    stopAutoSlide(); // Pause auto-slide when navigating manually
    prevSlide(); // Navigate to the previous slide
    startAutoSlide(); // Resume auto-slide
  });

  testimonialSection.addEventListener("mouseenter", () => {
    stopAutoSlide(); // Stop auto-slide when the user hovers over the section
  });

  testimonialSection.addEventListener("mouseleave", () => {
    startAutoSlide(); // Resume auto-slide when the user leaves the section
  });
}

// Utility function to debounce events (e.g., window resize) to improve performance
function debounce(func, wait) {
  let timeout;
  return function (...args) {
    clearTimeout(timeout); // Clear any existing timer
    timeout = setTimeout(() => func.apply(this, args), wait); // Set a new timer
  };
}

// Initialize the slider when the DOM content is fully loaded
document.addEventListener("DOMContentLoaded", () => {
  updateSlider(); // Set up the initial slider layout
  startAutoSlide(); // Start the auto-slide functionality
  initEventListeners(); // Add all necessary event listeners
});
