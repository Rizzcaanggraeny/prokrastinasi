<!DOCTYPE html>
<html>

<head>

    <title>Quiz Prokrastinasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/quiz.css'); ?>">

    
</head>

<body>

<div class="container py-5">

<form action="<?= base_url('index.php/quiz/hasil') ?>" method="post">

<?php foreach($quiz as $i => $q){ ?>

<div class="card quiz-card question-page <?= $i==0 ? '' : 'd-none'; ?>">

<div class="card-body p-5">

<div class="question-number">
PERTANYAAN <?= $q['id']; ?> DARI <?= count($quiz); ?>
</div>

<h2 class="question-title">
<?= $q['pertanyaan']; ?>
</h2>

<div class="row">

<?php

$pilihan = ['a','b','c','d','e','f'];

foreach($pilihan as $index => $p){

if(isset($q[$p])){

?>

<div class="col-md-6 mb-4">

<label class="option-card">

<input
type="radio"
name="jawaban[<?= $q['id']; ?>]"
value="<?= strtoupper($p); ?>"
<?= $index==0 ? 'required' : ''; ?>

>

<div class="option-letter">
<?= strtoupper($p); ?>
</div>

<div class="option-text">
<?= $q[$p]; ?>
</div>

</label>

</div>

<?php } } ?>

</div>

<div class="d-flex justify-content-between mt-4">

<?php if($i > 0){ ?>

<button
type="button"
class="btn btn-outline-dark prev-btn">
Previous
</button>

<?php }else{ ?>

<div></div>

<?php } ?>

<?php if($i < count($quiz)-1){ ?>

<button
type="button"
class="btn btn-dark next-btn">
Next 
</button>

<?php }else{ ?>

<button
type="submit"
class="btn btn-dark">
Lihat Hasil
</button>

<?php } ?>

</div>

</div>

</div>

<?php } ?>

</form>

</div>

<script src="<?= base_url('assets/js/quiz.js'); ?>"></script>

</body>

</html>