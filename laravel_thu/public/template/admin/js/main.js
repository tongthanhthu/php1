$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id , url){
    if(confirm('xóa mà không thể khôi phục ! bạn có chắc chắn muốn xóa')){
        $.ajax({
            type:'DELETE',
            datatype:'JSON',
            data:{id},
            url:url,
           success: function(result){
            if(result.error === false){
                location.reload();
            }else{
                alert('xoas loi');
            }
           }
        })
    }
}
/*upload*/

$('#upload').change(function(){
    const font = new FormData();
    form.append('file',$(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type:'POST',
        datatype:'JSON',
        data:form,
        url:'admin/upload/services',
        success: function($results){
            console.log($results);

        }
    });
});