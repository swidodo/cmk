<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $(document).on('click','.access', function(){
        id          = $(this).attr('data-id');
        let name    = $(this).attr('data-name');
        let val     ='';
        if($(this).is(':checked')){
             val = $(this).val();
        }else{
             val = '0';
        }
        $.ajax({
                url : '/permission/set',
                type : 'POST',
                dataType : 'json',
                data :{id:id,val:val,name:name},
                success :function(){
                }
            })
    });
</script>
