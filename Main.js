const buttons = document.querySelectorAll(".tab-btn");
    const sections = document.querySelectorAll(".section");

    buttons.forEach(button => {
      button.addEventListener("click", () => {
        // remove active from all buttons and sections
        buttons.forEach(btn => btn.classList.remove("active"));
        sections.forEach(sec => sec.classList.remove("active"));

        // activate clicked button and target section
        button.classList.add("active");
        document.getElementById(button.dataset.target).classList.add("active");
      });
    });