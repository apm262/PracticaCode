<?= $this->extend('PublicSection/base_layout') ?>

<?=  $this->section('css')  ?>
<link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/login.css') ?>"/>
<?=  $this->endSection('css')  ?>


<?=  $this->section('javascript')  ?>

<script type="text/javascript">
    $(document).ready(function(){

    });
</script>

<?=  $this->endSection('javascript')  ?>


<?=  $this->section('title')  ?>

Inicio

<?=  $this->endSection('title')  ?>


<?=  $this->section('content')  ?>

    <h1 class="fest">Festivales</h1>
    <h3>Indie</h3>

    <div class="indie">
        <div class="card">
            <img class="con" src="<?= base_url('assets/PublicSection/img/indie.jpg')  ?>">
            <h4>Title Card</h4>
            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <button type="button" class="btn btn-primary">Go somewhere</button> <br><br>
        </div>
        <div class="card">
            <img class="con" src="<?= base_url('assets/PublicSection/img/indie.jpg')  ?>">
            <h4>Title Card</h4>
            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <button type="button" class="btn btn-primary">Go somewhere</button> <br><br>
        </div>
        <div class="card">
            <img class="con" src="<?= base_url('assets/PublicSection/img/indie.jpg')  ?>">
            <h4>Title Card</h4>
            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <button type="button" class="btn btn-primary">Go somewhere</button> <br><br>
        </div>
    </div>

    <h3>Rock</h3>

    <div class="indie">
        <div class="card">
        <img class="con" src="<?= base_url('assets/PublicSection/img/rock.jpg')  ?>">
            <h4>Title Card</h4>
            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <button type="button" class="btn btn-primary">Go somewhere</button> <br><br>
        </div>
        <div class="card">
        <img class="con" src="<?= base_url('assets/PublicSection/img/rock.jpg')  ?>">
            <h4>Title Card</h4>
            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <button type="button" class="btn btn-primary">Go somewhere</button> <br><br>
        </div>
    </div>
    <br><br><br>


    <a href="<?= base_url('/login') ?>">Ir al login</a>



<?=  $this->endSection('content')  ?>