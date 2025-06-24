  const data = ["Search Technology", "Search Lifestyle", "Search Education", "Search Health"];
  let index = 0;
  let intervalId;

  const inputBox = document.querySelector(".animated_input");
  const input = inputBox.querySelector("input");
  const label = document.getElementById("animated_placeholder");

  function animatePlaceholder() {
    if (input.value.trim() === "") {
      inputBox.classList.remove("fade-in");
      inputBox.classList.add("fade-out");

      setTimeout(() => {
        index = (index + 1) % data.length;
        label.textContent = data[index];
        inputBox.classList.remove("fade-out");
        inputBox.classList.add("fade-in");
      }, 400);
    }
  }

  function startAnimation() {
    intervalId = setInterval(animatePlaceholder, 4000);
  }

  function stopAnimation() {
    clearInterval(intervalId);
  }

  input.addEventListener("input", () => {
    if (input.value.trim() !== "") {
      inputBox.classList.remove("fade-in");
      inputBox.classList.add("fade-out");
      stopAnimation();
    } else {
      label.textContent = data[index]; // show last state
      inputBox.classList.remove("fade-out");
      inputBox.classList.add("fade-in");
      startAnimation();
    }
  });

  window.onload = () => {
    startAnimation();
  };
