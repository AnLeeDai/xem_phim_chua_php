// dropdown menu
document.addEventListener("DOMContentLoaded", () => {
  const dropdownButton = document.getElementById("dropdown-button");
  const dropdownMenu = document.getElementById("dropdown-menu");

  dropdownButton.addEventListener("click", () => {
    const isDisplayed = dropdownMenu.style.display === "block";
    dropdownMenu.style.display = isDisplayed ? "none" : "block";
  });

  document.addEventListener("click", (event) => {
    if (
      !dropdownButton.contains(event.target) &&
      !dropdownMenu.contains(event.target)
    ) {
      dropdownMenu.style.display = "none";
    }
  });
});

// user info dropdown
document.addEventListener("DOMContentLoaded", () => {
  const avatar = document.querySelector(".user-avatar");
  const dropdownMenu = document.querySelector(".user-dropdown-menu");

  avatar.addEventListener("click", () => {
    const isDisplayed = dropdownMenu.style.display === "block";
    dropdownMenu.style.display = isDisplayed ? "none" : "block";
  });

  document.addEventListener("click", (event) => {
    if (
      !avatar.contains(event.target) &&
      !dropdownMenu.contains(event.target)
    ) {
      dropdownMenu.style.display = "none";
    }
  });
});
