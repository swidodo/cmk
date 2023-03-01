<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.user').select2({
            ajax: {
                url: '/group_user/get_user',
                type : 'POST',
                dataType: 'json',
                delay :800,
                data: function (params) {
                        return {
                            search: params.term
                        }
                    },
                    processResults: function (data,page) {
                        return {
                            results: data
                        };
                    },
            }
        })
        let flashdata = $('#flashdata').val();
        if (flashdata !=undefined){
            if (flashdata == 'success'){
                swal.fire({
                        title  :'success',
                        icon   : 'success',
                        text   : 'Data berhasil disimpan'
                    });
            }
        }
        $(document).on('click','.del_group_user',function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anada yakin ?',
                text: "Akan menghapus data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    let id = $(this).attr('data-id');
                    $.ajax({
                        url : '/group_user/'+id,
                        type : 'POST',
                        method : 'DELETE',
                        dataType :'json',
                        success : function(respon){
                            $('#'+id).remove();
                            if (respon.status == 'success'){
                                Swal.fire(
                                'Sukses!',
                                'Data berhasil di hapus',
                                'success'
                                )
                            }else{
                                Swal.fire(
                                'Error!',
                                'Data gagal di Hapus !',
                                'error'
                                )
                            }

                        }
                    })
                }
                })
        })
    })
</script>
