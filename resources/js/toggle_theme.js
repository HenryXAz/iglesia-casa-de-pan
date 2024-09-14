import Sun from "../assets/sun.svg";
import Moon from "../assets/moon.svg";

const toggleThemeButton = document.getElementById("toggle-theme-button");
toggleThemeButton.addEventListener("click", () => {
    toggleTheme();
});

let theme = localStorage.theme
let systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

const toggleTheme = () => {
    if (theme === "dark" || (!theme && systemTheme)) {
        localStorage.theme = "light";
        theme = "light";
    } else {
        localStorage.theme = "dark";
        theme = "dark";
    }

    loadToggleThemeButtonIcon();
    changeTheme();
};

const loadToggleThemeButtonIcon = () => {
    const img = document.createElement("img");
    img.src = (theme === "light") ? Moon : Sun;
    toggleThemeButton.replaceChildren(img);
};

const changeTheme = () => {
    if (theme === "dark" || (!theme && systemTheme)) {
        document.documentElement.classList.add("dark");
    } else {
       document.documentElement.classList.remove("dark");
    }
};

loadToggleThemeButtonIcon();
changeTheme();



