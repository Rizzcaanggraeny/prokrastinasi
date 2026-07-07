<!DOCTYPE html>
<html>

<head>

<title>Hasil Quiz</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= base_url('assets/css/hasil.css');?>">

</head>

<body>

<div class="container">

    <div class="card">

        <div class="card-header">
            <h2>Nih To Do List Lu</h2>
            <h4>JANGAN LUPA DI LAKUIN BWANG</h4>
        </div>

        <div class="card-body">

            <div class="list-group">

                <?php foreach($todo as $t){ ?>

                <label class="list-group-item">

                    <input type="checkbox">

                    <div class="todo-text">
                        <?= $t ?>
                    </div>

                </label>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

</body>

</html>