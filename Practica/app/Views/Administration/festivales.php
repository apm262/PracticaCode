<?= $this->extend('Administration/base_layout') ?>

<?=  $this->section('css')  ?>
<link rel="stylesheet" href="<?= base_url('assets/Administration/css/admin.css') ?>"/>
<?=  $this->endSection('css')  ?>


<?=  $this->section('javascript')  ?>

<script type="text/javascript">
    var columsDefinition = [
        {
            "targets":0,
            "render": function(data,type,row,meta){
                return row["id"];
            }
        },
        {
            "targets":1,
            "render": function(data,type,row,meta){
                return row["name"];
            }
        },
        {
            "targets":2,
            "render": function(data,type,row,meta){
                return row["date"];
            }
        },
        {
            "targets":3,
            "render": function(data,type,row,meta){
                return '<span class="badge bg-primary">'+row["price"] + "€" + '</span>';
            }
        },
        {
            "targets":4,
            "render": function(data,type,row,meta){
                return '<button class="btn-danger deleteBtn"><i class="fa fa-trash"></i></button> <button class="btn-success editBtn"><i class="fa fa-edit"></i></button>';
            }
        }

    ];
    $(document).ready( function(){
        let festivalsDatatable = $('#festivals_datatable').DataTable({
            "processing":true, //Muestra el 'cargando' de la pagina
            "responsive":true, //Permitirá que la tabla se ajuste automaticamente
            "serverSide":true, //Activar Ajax
            "searching":false, //Por si queremos que aparezca la barra buscador
            "columnDefs":columsDefinition, //Array de columnas
            "fnDrawCallback": function (oSettings) {
                //Controlar la paginación
                if(oSettings.iDisplayLength >= oSettings.fnRecordsTotal())
                    $(oSettings.nTableWrapper).find('dataTables_paginate').hide();
                else
                $(oSettings.nTableWrapper).find('dataTables_paginate').show();
            },
            "ajax" : { //Petición Ajax que obtendrá los datos del datatable
                url: "<?= route_to('mostrar_festivales') ?>",
                type:"POST",
                data: function() {},
                error: function(data){
                    console.log(data);
                }
            }
        });
    

        $('#festivals_datatable tbody').on('click', '.deleteBtn',function () {

            //obtengo los datos de la fila pulsada
            var data = festivalsDatatable.row($(this).parents('tr')).data();

            console.log(data.id);
            event.preventDefault();
            $json_data ={
                "id": data.id
            }

            $.ajax({
                url: "<?= route_to('delete_festivales') ?>",
                type: "DELETE",
                data: JSON.stringify($json_data),
                processData: false,
                contentType: false,
                dataType: "json",
                async: true,
                timeout: 5000,
                beforeSend:(xhr) =>{},
                success: (response) =>{
                    //Si va todo bien se recargará la página de esta manera
                    $('#festivals_datatable').DataTable().ajax.reload(null,false);
                },
                error: (xhr, status, error) =>{
                    alert("Se ha producido un error");
                },
                complete: () =>{}
            });
                        
        });
        $('.new-festival-btn').click(function(){
            window.location.href ="<?=route_to('festivals_view_edit') ?>";
        });
        $('#festivals_datatable tbody').on('click', '.editBtn',function () {
            var data = festivalsDatatable.row($(this).parents('tr')).data();
            window.location.href =" <?=route_to('festivals_view_edit') ?>/"+data.id;
            //window.location.href ="route_to('admin/festivals/view/edit/')?>"+data.id;
        });
    });

 
</script>

<?=  $this->endSection('javascript')  ?>


<?=  $this->section('title')  ?>

<?= $title; ?>

<?=  $this->endSection('title')  ?>


<?=  $this->section('content')  ?>

    <p class="ini">Listado de festivales</p>

    <button class="btn btn-primary new-festival-btn" style="margin-bottom: 5px;">Nuevo Festival <i class="fas fa-plus-square"></i></button>

    <table id="festivals_datatable" class="display" style="width:100%;">

        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
    
    </table>


<?=  $this->endSection('content')  ?>