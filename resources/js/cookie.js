const wrapper = document.querySelector(".wrapper");
let buttons = document.querySelectorAll(".boot");
if (!sessionStorage.session) {
    sessionStorage.session = 0;
}

const executeCodes = () => {
    wrapper.classList.add("left");
};
    buttons.forEach((buttons) => {
    buttons.addEventListener("click", () => {
        wrapper.classList.add("d-none");
        sessionStorage.session = 1;
    });
    
});

 if (sessionStorage.session == 0) {
    executeCodes();
} else {
    wrapper.classList.add("d-none");
}

