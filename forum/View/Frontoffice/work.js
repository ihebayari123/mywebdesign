document.addEventListener("DOMContentLoaded", () => {
  const button = document.querySelector(".continue-application");
  const formContainer = document.getElementById("discussion-form-container");

  button.addEventListener("click", (event) => {
    event.preventDefault();

    // Toggle form visibility
    if (formContainer.style.display === "block") {
      formContainer.style.display = "none";
      return;
    }

    // Get button position
    const buttonRect = button.getBoundingClientRect();
    const offsetTop = buttonRect.bottom + window.scrollY;
    const offsetLeft = buttonRect.left;

    // Set form position
    formContainer.style.position = "absolute";
    formContainer.style.top = `${offsetTop + 10}px`; // Position below the button
    formContainer.style.left = `${offsetLeft}px`;

    // Show the form
    formContainer.style.display = "block";
  });
});

// Validation function
function validateForm() {
  const title = document.getElementById("title").value.trim();
  const content = document.getElementById("content").value.trim();
  const author = document.getElementById("author").value.trim();

  if (!title) {
    alert("Title is required.");
    return false;
  }
  if (!content) {
    alert("Content is required.");
    return false;
  }
  if (!author) {
    alert("Author is required.");
    return false;
  }

  return true; // Allow form submission
}




