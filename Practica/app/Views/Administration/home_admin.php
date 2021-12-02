<?= $this->extend('Administration/base_layout') ?>

<?=  $this->section('css')  ?>
<link rel="stylesheet" href="<?= base_url('assets/Administration/css/admin.css') ?>"/>
<?=  $this->endSection('css')  ?>


<?=  $this->section('javascript')  ?>

<script type="text/javascript">
    $(document).ready(function(){

    });
</script>

<?=  $this->endSection('javascript')  ?>


<?=  $this->section('title')  ?>

Admin

<?=  $this->endSection('title')  ?>


<?=  $this->section('content')  ?>

    <p class="ini">Inicio</p>


<?=  $this->endSection('content')  ?>