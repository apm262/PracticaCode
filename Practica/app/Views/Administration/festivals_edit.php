<?= $this->extend('Administration/base_layout') ?>

<?=  $this->section('css')  ?>
<link rel="stylesheet" href="<?= base_url('assets/Administration/css/admin.css') ?>"/>
<?=  $this->endSection('css')  ?>


<?=  $this->section('javascript')  ?>

<script type="text/javascript">
</script>

<?=  $this->endSection('javascript')  ?>


<?=  $this->section('title')  ?>

<?= $title; ?>

<?=  $this->endSection('title')  ?>


<?=  $this->section('content')  ?>

    <p class="ini"><?= $title; ?></p>
    

    <form class="formulario" id="formulario" method="POST" >
        <input style="display: none;" type="text" id="id" class="form-control" name="id" value="<?= $festival->id?>">
        <label class="form-label" for="name">Nombre</label>
        <input required type="text" id="name" class="form-control" name="name" value="<?= $festival->name?>">

        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" class="form-control" name="email" value="<?= $festival->email?>">
        
        <label class="form-label" for="date">Fecha</label>
        <input type="date" id="date" class="form-control" name="date" value="<?= $festival->getDateInputFormat($festival->date)?>">

        <label class="form-label" for="price">Price</label>
        <input type="number" id="price" class="form-control" name="price" value="<?= $festival->price?>">

        <label class="form-label" for="address">Direccion</label>
        <input type="text" id="address" class="form-control" name="address" value="<?= $festival->address?>">

        <label class="form-label" for="image_url">Imagen</label>
        <input type="text" id="image_url" class="form-control" name="image_url" value="<?= $festival->image_url?>">

        <label class="form-label" for="category_id">Categoria ID</label>
        <select class="form-select" name="category_id">
            <?php foreach($categories as $cat): ?>
                <option value="<?=$cat->id?>"<?php if($cat->id == $festival->category_id):?> selected <?php endif ?>>
                    <?=$cat->name?>
                </option>
            <?php endforeach ?>
        </select>
           <button class="btn btn-primary" id="formulario" type="submit">Guardar</button>
        </form>
<?=  $this->endSection('content')  ?>