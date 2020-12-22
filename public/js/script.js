// login form
const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");
const outputPrice = document.getElementById("totalBill");

// Checkout Page
const deliveryCheckout = document.querySelector("#delivery");
const takeOut = document.querySelector("#takeOut");
const price = outputPrice.innerHTML;

window.addEventListener("load", () => {
    outputPrice.innerHTML = deliveryCheckout.checked
        ? parseInt(price) + 150
        : price;
});

deliveryCheckout.addEventListener("click", () => {
    outputPrice.innerHTML = parseInt(price) + 150;
});

takeOut.addEventListener("click", () => {
    outputPrice.innerHTML = price;
});

signUpButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
});
