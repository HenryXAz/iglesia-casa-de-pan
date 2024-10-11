const slideComponent = () => ({
    slides: [],
    domain: import.meta.env.VITE_APP_URL,
    currentSlideIndex: 1,
    setSlides(slides) {
        this.slides = slides
    },
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1
        } else {
            // If it's the first slide, go to the last slide
            this.currentSlideIndex = this.slides.length
        }
    },
    next() {
        if (this.currentSlideIndex < this.slides.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            // If it's the last slide, go to the first slide
            this.currentSlideIndex = 1
        }
    }
});

export default slideComponent;
