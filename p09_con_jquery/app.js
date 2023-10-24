$(document).ready(function() {
    console.log('jQuery Is working');
    $('#task-result').hide();
    fetchTask();

    $('#search').keyup(function() {
        if ($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: 'task-search.php',
                type: 'POST',
                data: { search },
                success: function(response) {
                    let productos = JSON.parse(response);
                    let template = '';

                    productos.forEach(producto => {
                        template += `<li>${producto.nombre}</li>`;
                    });
                    $('#container').html(template);
                    $('#task-result').show();
                }
            });
        }
    });

    $('#task-form').submit(function(e) {
        e.preventDefault();
        const postData = {
            nombre: $('#nombre').val(),
            precio: $('#precio').val(),
            unidades: $('#unidades').val(),
            modelo: $('#modelo').val(),
            marca: $('#marca').val(),
            detalles: $('#detalles').val(),
        };
        $.post('task-add.php', postData, function(response) {
            fetchTask();
            $('#task-form').trigger('reset');
        });
    });

    function fetchTask() {
        $.ajax({
            url: 'task-list.php',
            type: 'GET',
            success: function(response) {
                let tasks = JSON.parse(response);
                let template = '';

                tasks.forEach(producto => {
                    template += `<tr data-taskId="${producto.id}">
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td>${producto.precio}</td>
                        <td>${producto.unidades}</td>
                        <td>${producto.modelo}</td>
                        <td>${producto.marca}</td>
                        <td>${producto.detalles}</td>
                        <td><button class="task-delete btn btn-danger">
                        Borrar
                        </button></td>
                    </tr>`;
                });

                $('#tasks').html(template);
            }
        });
    }

    $(document).on('click', '.task-delete', function() {
        let element = $(this).closest('tr');
        let id = element.data('taskId');
        $.post('task-delete.php', { id }, function(response) {
            console.log(response);
            fetchTask(); // Actualiza la lista después de la eliminación
        });
    });
});


