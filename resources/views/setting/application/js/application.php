<script>

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#form_create_application').on('submit',function(e){
        e.preventDefault()
        let data = $('#form_create_application').serialize();
        $.ajax({
            url : '/application',
            type : 'POST',
            data : data,
            dataType :'json',
            success : function(a){
                addvalidate(a);
                swal.fire({
                    title :'success',
                    icon   : 'success',
                    text   : 'Data berhasil disimpan'
                });
            },
            error:function(err){
                addvalidate(err.responseJSON);
            }
        })
    })
    function addvalidate(err){
       if(err.errors.name !=undefined){
            $('#err_name').html(err.errors.name[0]);
            $('#inputapliksi').addClass('is-invalid');
       }else{
            $('#errorname').html('');
            $('#inputapliksi').removeClass('is-invalid');
       }
       if (err.errors.group_application_id !=undefined){
            $('#err_group_id').html(err.errors.group_application_id[0]);
            $('#group_application_id').addClass('is-invalid');
       }else{
            $('#err_group_id').html('');
            $('#group_application_id').removeClass('is-invalid');
       }
       if (err.errors.status !=undefined){
            $('#err_status').html(err.errors.status[0]);
            $('#status').addClass('is-invalid');
       }else{
            $('#err_status').html('');
            $('#status').removeClass('is-invalid');
       }
       if (err.errors.description !=undefined){
            $('#err_description').html(err.errors.description[0]);
            $('#description').addClass('is-invalid');
       }else{
            $('#err_description').html('');
            $('#description').removeClass('is-invalid');
       }
       if (err.errors.directory !=undefined){
            $('#err_directory').html(err.errors.directory[0]);
            $('#directory').addClass('is-invalid');
       }else{
            $('#err_directory').html('');
            $('#directory').removeClass('is-invalid');
       }
    }
    function editvalidate(err){
        if(err.errors.name !=undefined){
            $('#err_edit_name').html(err.errors.name[0]);
            $('#edit_inputapliksi').addClass('is-invalid');
        }
    }
</script>
