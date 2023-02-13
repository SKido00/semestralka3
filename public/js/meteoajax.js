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
        btnSave = $('.btn-save');

    var table = $('#meteo').DataTable({
        ajax: '',
        serverSide: true,
        processing: true,
        aaSorting:[[0,"desc"]],
        columns: [{data: 'id', name: 'id'},
            {data: 'ad_code', name: 'ad_code'},
            {data: 'observation', name: 'observation'},
            {data: 'met_text', name: 'met_text'},
            {data: 'action', name: 'action'},
        ]
    });

    btnAdd.click(function(){
        modal.modal()
        form.trigger('reset')
        modal.find('.modal-title').text('Add New')
        btnSave.show();

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





    $(document).on('click','.btn-delete',function(){
        if(!confirm("Are you sure?")) return;

        var rowid = $(this).data('rowid')
        var el = $(this)
        if(!rowid) return;
        console.log(rowid)

        $.ajax({
            type: "DELETE",
            dataType: 'JSON',
            url: "meteo/destroy/"+rowid,
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
