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





<?=  $this->section('content')  ?>

<center>
    <div class="caja">

        <img class="foto" src="<?= base_url('assets/PublicSection/img/logoinsti.png')  ?>">

        <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Please Sign in</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</center>



<?=  $this->endSection('content')  ?>