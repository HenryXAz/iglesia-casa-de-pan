const sidebar = () => ({
    isOpen: window.innerWidth > 800,
    toggleSidebar() {
        this.isOpen = !this.isOpen;
    },
});

export default sidebar;

