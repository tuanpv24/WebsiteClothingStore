const menuBar = document.querySelector(".menu-bar");
const aside = document.querySelector("aside");
const wrapper = document.querySelector(".wrapper");
const header = document.querySelector(".header");
const footer = document.querySelector("footer");
const sidebarBg = document.querySelector(".sidebar-overlay");

menuBar.addEventListener("click", () => {
  aside.classList.toggle("toggle-aside");
  wrapper.classList.toggle("toggle-wrapper");
  header.classList.toggle("toggle-header");
  sidebarBg.classList.toggle("sidebar-bg");
  footer.classList.toggle("toggle-footer");
  if (innerWidth < 950) {
    aside.classList.remove("toggle-aside");
    aside.classList.add("toggle-aside-res");
  }
});

window.addEventListener("resize", () => {
  if (innerWidth < 950) {
    aside.classList.remove("toggle-aside");
  }
  if (innerWidth < 1125) {
    aside.classList.add("toggle-aside");
    wrapper.classList.add("toggle-wrapper");
    header.classList.add("toggle-header");
    footer.classList.add("toggle-footer");
  }
  if (innerWidth > 950) {
    aside.classList.remove("toggle-aside-res");
    sidebarBg.classList.remove("sidebar-bg");
  }
  if (
    !aside.classList.contains("toggle-aside-res") &&
    !sidebarBg.classList.remove("sidebar-bg") &&
    innerWidth < 950
  ) {
    wrapper.classList.remove("toggle-wrapper");
    header.classList.remove("toggle-header");
    footer.classList.remove("toggle-footer");
  }
});

sidebarBg.addEventListener("click", () => {
  aside.classList.remove("toggle-aside-res");
  sidebarBg.classList.remove("sidebar-bg");
});
