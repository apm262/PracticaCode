<?= $this->extend('PublicSection/base_layout') ?>

<?=  $this->section('css')  ?>
    <link rel="stylesheet" href="<?= base_url('assets/PublicSection/css/login.css') ?>"/>
<?=  $this->endSection('css')  ?>


<?=  $this->section('javascript')  ?>

<script src="<?= base_url('assets/PublicSection/js/login.js') ?>"></script>

<script type="text/javascript">
    

    $(document).ready(function(){

    });
</script>

<?=  $this->endSection('javascript')  ?>
<?=  $this->section('title')  ?>

Login

<?=  $this->endSection('title')  ?>

<?=  $this->section('content')  ?>

<center>
    <div class="caja">

        <img class="foto" src="<?= base_url('assets/PublicSection/img/logoinsti.png')  ?>">

        <form method="POST" id="form">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Please Sign in</label>
            <input type="email" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" id="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button> <br><br>
        </form>

        <div class="copy"><i class="far fa-copyright"></i> 2017-2021</div><br>

        <div class="hr"><a href="<?= base_url('/home') ?>">Ir a inicio público</a>&nbsp;&nbsp;<a href="<?= base_url('/home/admin') ?>">Ir a inicio privado</a></div>

    </div>

</center>



<?=  $this->endSection('content')  ?>