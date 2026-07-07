<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Article</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylemotivasi.css'); ?>">
</head>
<body>

<nav>
    <ul>
        <li><a href="<?= site_url('prokrastinasi'); ?>">Home</a></li>
        <li><a href="<?= site_url('prokrastinasi/motivasi'); ?>">Article</a></li>
        <li><a href="<?= site_url('prokrastinasi/profile'); ?>">Profile</a></li>
    </ul>
</nav>

<section class="hero">
    <h1>Article</h1>
</section>

<div class="container-hover">
    <img src="<?= base_url('img/bingung.jpeg'); ?>" class="tampilan-gambar artikel-trigger" alt="bingung" data-artikel="artikelbingung.jpeg">
    <video class="tampilan-video" loop muted playsinline>
        <source src="<?= base_url('assets/video/bingung.mp4'); ?>" type="video/mp4">
    </video>
</div>

<div class="container-hover">
    <img src="<?= base_url('img/sad.jpeg'); ?>" class="tampilan-gambar" alt="sad">
    <video class="tampilan-video" loop muted playsinline>
        <source src="<?= base_url('assets/video/sad.mp4'); ?>" type="video/mp4">
    </video>
</div>

<!-- Modal untuk Artikel -->
<div id="artikelModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="artikelImage" src="" alt="Artikel">
    </div>
</div>

<!-- Section Konten Artikel -->
<section class="artikel-content">
    <div class="artikel-container">
        <h2>Prokrastinasi</h2>
        
        <h3>Definisi Prokrastinasi</h3>
        <p>Prokrastinasi adalah perilaku menunda atau menangguhkan suatu tugas atau pekerjaan yang seharusnya dikerjakan, meskipun seseorang menyadari bahwa penundaan tersebut dapat menimbulkan dampak negatif. Orang yang melakukan prokrastinasi cenderung mengalihkan perhatian pada aktivitas lain yang lebih menyenangkan atau lebih mudah dibandingkan menyelesaikan tugas yang menjadi tanggung jawabnya.</p>
        
        <p>Secara sederhana, prokrastinasi merupakan kebiasaan menunda pekerjaan hingga mendekati batas waktu atau bahkan tidak terselesaikan tepat waktu. Perilaku ini dapat terjadi dalam berbagai aspek kehidupan, seperti pendidikan, pekerjaan, maupun aktivitas sehari-hari, dan sering kali dipengaruhi oleh faktor seperti rasa malas, kurangnya motivasi, takut gagal, atau kesulitan dalam mengatur waktu.</p>

        <h3>Dampak Prokrastinasi</h3>
        <ol>
            <li>Menurunnya kualitas hasil pekerjaan</li>
            <li>Meningkatnya stres dan kecemasan</li>
            <li>Berkurangnya produktivitas</li>
            <li>Terganggunya manajemen waktu</li>
            <li>Menurunnya prestasi akademik atau kinerja kerja</li>
            <li>Hilangnya kesempatan dan kepercayaan</li>
            <li>Munculnya rasa bersalah dan penyesalan</li>
        </ol>
    </div>
</section>

<script src="<?= base_url('assets/js/hover-video.js'); ?>"></script>
<script>
    const containers = document.querySelectorAll('.container-hover');
    containers.forEach(container => {
        const video = container.querySelector('.tampilan-video');

        container.addEventListener('mouseenter', () => {
            video.play();
        });

        container.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0; // Mengulang video ke awal
        });
    });

    // Modal Artikel Handler
    const modal = document.getElementById('artikelModal');
    const artikelImage = document.getElementById('artikelImage');
    const closeBtn = document.querySelector('.close');
    const artikelTriggers = document.querySelectorAll('.artikel-trigger');

    // Open modal saat gambar diklik
    artikelTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const artikelSrc = trigger.getAttribute('data-artikel');
            artikelImage.src = "<?= base_url('img/'); ?>" + artikelSrc;
            modal.style.display = 'block';
        });
    });

    // Close modal saat X diklik
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Close modal saat klik di luar gambar
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>
</body>
</html>