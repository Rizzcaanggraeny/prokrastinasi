<script>
    const containers = document.querySelectorAll('.container-hover');
    containers.forEach(container => {
        const video = container.querySelector('.tampilan-video');
        
        container.addEventListener('mouseenter', () => {
            video.play();
        });
        
        container.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0; // Mengulang video ke awal saat kursor keluar
        });
    });
</script>