import './bootstrap';
import userCardSidebar from "./alpine_components/user_card_sidebar.js";
import sidebar from "./alpine_components/sidebar.js";
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data("user_card_sidebar", userCardSidebar);
Alpine.data("sidebar", sidebar);

Alpine.start();
