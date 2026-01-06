<?php
error_reporting(E_ALL);   
ini_set('display_errors', 1);   
ini_set('display_startup_errors', 1);
$pageTitle = "Artikel";
include 'inc/header.php';
include 'inc/function_article.php';

$articles = uhiha();

?>

<div class="hero-section">
    <div class="container">
        <h1>Artikel & berita sekolah</h1>
        <p>Dapatkan informasi terbaru, tips belajar, dan wawasan pendidikan yang bermanfaat untuk perkembangan akademik Anda</p>
    </div>
</div>

<div class="articles-section">
    <div class="container">
        <div class="section-header">
            <h2>Artikel Terbaru</h2>
            <p>Jelajahi koleksi artikel kami yang informatif dan inspiratif</p>
        </div>

        <?php if (empty($articles)): ?>
            <div class="no-articles">
                <p>Tidak ada artikel yang tersedia saat ini.</p>
            </div>
        <?php else: ?>
            <div class="articles-grid">
                <?php foreach ($articles as $a): ?>
                    <div class="article-card">
                        <?php if (!empty($a['gambar'])): ?>
                            <div class="article-image">
                                <img src="assets/image/<?= htmlspecialchars($a['gambar']) ?>" alt="<?= htmlspecialchars($a['judul']) ?>">
                            </div>
                        <?php endif; ?>

                        <div class="article-content">
                            <h3 class="article-title"><?= htmlspecialchars($a['judul']) ?></h3>

                            <?php
                            $preview = strip_tags($a['isi']);
                            if (strlen($preview) > 200) {
                                $preview = substr($preview, 0, 200) . '...';
                            }
                            ?>
                            <p class="article-preview"><?= htmlspecialchars($preview) ?></p>

                            <div class="article-meta">
                                <div class="article-date">
                                    <i class="far fa-calendar"></i>
                                    <span><?= date('d M Y', strtotime($a['tanggal'])) ?></span>
                                </div>

                                <a href="detail_article.php?id=<?= $a['id'] ?>" class="read-more">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
