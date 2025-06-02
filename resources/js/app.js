import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll("form[data-loading-button]");

    forms.forEach((form) => {
        const button = form.querySelector("button[data-loading-button]");
        const spinner = form.querySelector("[data-spinner]");
        const text = form.querySelector("[data-button-text]");

        if (!button) {
            console.warn("No submit button found for form", form);
            return;
        }

        form.addEventListener("submit", () => {
            button.disabled = true;
            button.classList.add("cursor-not-allowed", "opacity-50");

            if (text) text.textContent = "Please wait...";
            if (spinner) spinner.classList.remove("hidden");
        });
    });
});
