<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#all').on('click', function(){
        let val_group = $('#choose_role').val();
        let list = $(this).attr('data-list');
        if (val_group == ""){
            swal.fire({
                icon : 'error',
                title :'Error!',
                text : 'Silahkan Pilih Role terlebih dahulu !',
            });
            return false;
        }
        if (list == 'all'){
            let role = $('#roleId').val();
            if($(this).is(':checked')){
                addAllList(role);
            }else{
                removeAllList(role);
            }
        }
    })
    $(document).on('click','.access', function(){
        let val_group = $('#choose_role').val();
        let role = $('#roleId').val();
        let groupId = $(this).attr('data-id');
        if (val_group == ""){
            swal.fire({
                icon : 'error',
                title :'Error!',
                text : 'Silahkan Pilih Role terlebih dahulu !',
            });
            return false;
        }
        if($(this).is(':checked')){
            addList(role,groupId);
        }else{
            removeList(role,groupId);
        }
    })
    function addList(role,groupId){
        $.ajax({
            url : '/permission_group/addList',
            type :'POST',
            data :{role_id:role,group_id:groupId},
            dataType : 'json',
            success : function(){

            },
            error : function(){
                alert('error! Terjadi kesalahan, Coba ulangi lagi !');
            }
        })
    }
    function removeList(role,groupId){
        $.ajax({
            url : '/permission_group/removeList',
            type :'POST',
            data :{role_id:role,group_id:groupId},
            dataType : 'json',
            success : function(){

            },
            error : function(){
                alert('error! Terjadi kesalahan, Coba ulangi lagi !');
            }
        })
    }
    function addAllList(role){
        $.ajax({
            url : '/permission_group/update',
            type :'POST',
            data :{role_id:role},
            dataType : 'json',
            success : function(){

            },
            error : function(){
                alert('error! Terjadi kesalahan, Coba ulangi lagi !');
            }
        })
    }
    function removeAllList(role){
        $.ajax({
            url : '/permission_group/removeAll',
            type :'POST',
            data :{role_id:role},
            dataType : 'json',
            success : function(){

            },
            error : function(){
                alert('error! Terjadi kesalahan, Coba ulangi lagi !');
            }
        })
    }
</script>
