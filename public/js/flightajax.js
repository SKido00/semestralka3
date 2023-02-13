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

    var table = $('#flight').DataTable({
        ajax: '',
        serverSide: true,
        processing: true,
        aaSorting:[[0,"desc"]],
        columns: [{data: 'id', name: 'id'},
            {data: 'arcid', name: 'arcid'},
            {data: 'rule', name: 'rule'},
            {data: 'acType', name: 'acType'},
            {data: 'adep', name: 'adep'},
            {data: 'ades', name: 'ades'},
            {data: 'eet', name: 'eet'},
            {data: 'dof', name: 'dof'},
            {data: 'flevel', name: 'flevel'},
            {data: 'speed', name: 'speed'},
            {data: 'route', name: 'route'},
            {data: 'remark', name: 'remark'},
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
        form.find('input[name="arcid"]').val(rowData.arcid)
        form.find('input[name="rule"]').val(rowData.rule)
        form.find('input[name="acType"]').val(rowData.acType)
        form.find('input[name="adep"]').val(rowData.adep)
        form.find('input[name="ades"]').val(rowData.ades)
        form.find('input[name="eet"]').val(rowData.eet)
        form.find('input[name="dof"]').val(rowData.dof)
        form.find('input[name="flevel"]').val(rowData.flevel)
        form.find('input[name="speed"]').val(rowData.speed)
        form.find('input[name="route"]').val(rowData.route)
        form.find('input[name="remark"]').val(rowData.remark)


        modal.modal()
    })

    btnUpdate.click(function(){
        if(!confirm("Are you sure?")) return;
        var formData = form.serialize()+'&_method=PUT&_token='+token
        var updateId = form.find('input[name="id"]').val()
        console.log(updateId);
        $.ajax({
            type: "PUT",
            url: "flight/update/" + updateId,
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
            url: "flight/destroy/"+rowid,
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
