import './bootstrap';

<<<<<<< HEAD
document.addEventListener('DOMContentLoaded', function() {
    // Cek dulu apakah ada slider di halaman ini supaya tidak error di halaman lain
    const track = document.getElementById('slider-track');
    
    if (track) {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dots = document.querySelectorAll('.slider-dot');
        
        let currentIndex = 0;
        const totalSlides = dots.length;
        let slideInterval;

        // Fungsi Ganti Slide
        function updateSlide() {
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
            
            dots.forEach((dot, index) => {
                if(index === currentIndex) {
                    dot.classList.remove('bg-white/50');
                    dot.classList.add('bg-sekolah-hijau', 'scale-125');
                } else {
                    dot.classList.add('bg-white/50');
                    dot.classList.remove('bg-sekolah-hijau', 'scale-125');
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlide();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlide();
        }

        // Event Listeners
        if(nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetTimer(); });
        if(prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetTimer(); });

        dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                currentIndex = parseInt(e.target.dataset.index);
                updateSlide();
                resetTimer();
            });
        });

        // Auto Play
        function startTimer() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function resetTimer() {
            clearInterval(slideInterval);
            startTimer();
        }

        // Jalankan
        updateSlide();
        startTimer();
    }
});
=======
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
>>>>>>> 20b2a43e8eef9bdcc3fa18c7822ed2dfddd2d793
