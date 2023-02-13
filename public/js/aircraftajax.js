$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function() {
    $.noConflict();
    var token = $("meta[name='csrf-token']").attr("content");
    var modal = $('.modal')
    var form = $('.form')
    var btnAdd = $('.add'),
    btnSave = $('.btn-save'),
    btnUpdate = $('.btn-update');

    var table = $('#aircraft').DataTable({
    ajax: '',
    serverSide: true,
    processing: true,
    aaSorting:[[0,"desc"]],
    columns: [{data: 'id', name: 'id'},
{data: 'acType', name: 'acType'},
{data: 'acWakeTurb', name: 'acWakeTurb'},
{data: 'acName', name: 'acName'},
{data: 'action', name: 'action'},
    ]
});

    btnAdd.click(function(){
    modal.modal()
    form.trigger('reset')
    modal.find('.modal-title').text('Add New')
    btnSave.show();
    btnUpdate.hide()
})

    btnSave.click(function(e){
    e.preventDefault();
    var data = form.serialize()
    console.log(data)
    $.ajax({
    type: "POST",
    url: "",
    data: data+'&_token='+token,
    success: function (data) {
    if (data.success) {
    table.draw();
    form.trigger("reset");
    modal.modal('hide');
}
    else {
    alert('Delete Fail');
}
}
}); //end ajax
})


    $(document).on('click','.btn-edit',function(){
    btnSave.hide();
    btnUpdate.show();


    modal.find('.modal-title').text('Update Record')
    modal.find('.modal-footer button[type="submit"]').text('Update')

    var rowData =  table.row($(this).parents('tr')).data()
    form.find('input[name="id"]').val(rowData.id)
    form.find('input[name="acType"]').val(rowData.acType)
    form.find('input[name="acWakeTurb"]').val(rowData.acWakeTurb)
    form.find('input[name="acName"]').val(rowData.acName)


    modal.modal()
})

    btnUpdate.click(function(){
    if(!confirm("Are you sure?")) return;
    var formData = form.serialize()+'&_method=PUT&_token='+token
    var updateId = form.find('input[name="id"]').val()
    console.log(updateId);
    $.ajax({
    type: "PUT",
    url: "aircraft/update/" + updateId,
    data: formData,
    success: function (data) {
    if (data.success) {
    table.draw();
    modal.modal('hide');
}
}
}); //end ajax
})


    $(document).on('click','.btn-delete',function(){
    if(!confirm("Are you sure?")) return;

    var rowid = $(this).data('rowid')
    var el = $(this)
    if(!rowid) return;
    console.log(rowid)

    $.ajax({
    type: "DELETE",
    dataType: 'JSON',
    url: "aircraft/destroy/"+rowid,
    data: {_method: 'delete',_token:token},
    success: function (data) {
    if (data.success) {
    table.row(el.parents('tr'))
    .remove()
    .draw();
}
}
}); //end ajax
})
})
