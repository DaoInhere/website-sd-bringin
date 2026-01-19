import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
   
    const track = document.getElementById('slider-track');
    
    if (track) {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dots = document.querySelectorAll('.slider-dot');
        
        let currentIndex = 0;
        const totalSlides = dots.length;
        let slideInterval;

        
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

        
        if(nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetTimer(); });
        if(prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetTimer(); });

        
        dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                currentIndex = parseInt(e.target.dataset.index);
                updateSlide();
                resetTimer();
            });
        });

        
        function startTimer() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function resetTimer() {
            clearInterval(slideInterval);
            startTimer();
        }

        
        updateSlide();
        startTimer();
    }
});