<script type="text/javascript">
$(function() {

    $("#sideEngineer").show()




})

//modal เปิดซ้อนกันได้
$(document).on('show.bs.modal', '.modal', function() {
    const zIndex = 1040 + 10 * $('.modal:visible').length;
    $(this).css('z-index', zIndex);
    setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass(
        'modal-stack'));
});

$.ajax({
    type: "POST",
    url: "ajax/get_fg.php",
    //    data: $("#frmMain").serialize(),
    success: function(result) {
        // alert(result)
        for (count = 0; count < result.stcodemain.length; count++) {


            $('#tableStock').append(
                '<tr data-toggle="modal" data-target="#modal_edit" id="' + result
                .stcodemain[
                    count] + '" data-whatever="' + result.stcodemain[
                    count] + '">.<td>' + result.stcodemain[count] + '</td><td>' +
                result.stname1[count] + '</td></tr>');
        }

        var table = $('#tableStock').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });

        $(".dataTables_filter input[type='search']").attr({
            size: 30,
            maxlength: 30
        });



    }
});

//modal เพิ่มของขาย
$.ajax({
    type: "POST",
    url: "ajax/get_stock.php",

    success: function(result) {

        for (count = 0; count < result.code.length; count++) {

            $('#table_stock tbody').append(
                '<tr data-toggle="modal" data-dismiss="modal" onClick="onClick_stock(\'' +
                result.stcode[count] + '\',\'' + result.stname1[count] + '\',\'' + result.unit[count] +
                '\');"><td>' + result.stcode[count] +
                '</td><td>' +
                result.stname1[count] +
                '</td><td>' +
                result.unit[count] +
                '</td><td>Material</td></tr>');


        }

        $('#table_stock').DataTable({
            "dom": '<"pull-left"f>rt<"bottom"p><"clear">',
            "ordering": true
        });


        $(".dataTables_filter input[type='search']").attr({
            size: 40,
            maxlength: 40
        });
    }
});


$('#modal_edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data('whatever');
    var modal = $(this);
    $("#tableSO tbody").empty();

    $.ajax({
        type: "POST",
        url: "ajax/getsup_stock.php",
        data: "idcode=" + recipient,
        success: function(result) {
            modal.find('.modal-body #stcodemain').val(result.stcodemain[0]);
            modal.find('.modal-body #stname1').val(result.stname1[0]);
            modal.find('.modal-body #unit').val(result.unit[0]);


            for (count = 0; count < result.stcodemain.length; count++) {


                $('#tableSO').append(
                    '<tr id="detail' + result.stcode[count] + '"><td >' + result.stcode[count] +
                    '</td><td>' +
                    result.stname1[count] + '</td><td>' + result.amount[count] + '</td><td>' +
                    result.unit[count] +
                    '</td><td><button type="button" onClick="onDelete_MainTable(\'' +
                    result.stcodemain[count] +
                    '\',\'' +
                    result.stcode[count] +
                    '\',\'old\')"; class="btn btn-danger form-control" ><i class="fa fa fa-times" aria-hidden="true"></i class=> </button></td></tr>'
                );
            }


        }
    });
});

function onClick_stock(stcode, stname, unit) {

    let stcodemain = $("#stcodemain").val();
    // alert($("#stcodemain").val());
    $.ajax({
        type: "POST",
        url: "ajax/add_bomdetail.php",
        data: "stcode=" + stcode + "&stname=" + stname + "&unit=" + unit + "&stcodemain=" + stcodemain,
        success: function(result) {
            // alert(result.message);

            if (result.status == 1) {
                $('#tableSO').append(
                    '<tr id="detail' + stcode + '"><td >' + stcode + '</td><td>' +
                    stname + '</td><td>1</td><td>' +
                    unit +
                    '</td><td><button type="button" onClick="onDelete_MainTable(\'' +
                    stcodemain +
                    '\',\'' +
                    stcode +
                    '\',\'new\')"; class="btn btn-danger form-control" ><i class="fa fa fa-times" aria-hidden="true"></i class=> </button></td></tr>'
                );
            } else 
            {
                alert('error')
            }


        }
    });




}

function onDelete_MainTable(stcodemain, stcode, type) {
    if (confirm('คุณต้องการลบรายงานจริงใช่หรือไม่') == true) {

        if (type == 'old') {
            $.ajax({
                type: "POST",
                url: "ajax/delete_detail.php",
                data: "stcodemain=" + stcodemain + "&stcode=" + stcode,
                success: function(result) {

                    if (result.status == 1) // Success
                    {

                    }
                }
            });
        }
        $("#detail" + stcode).remove();
    }


}

$("#btnRefresh").click(function() {
    window.location.reload();
});

//เพิ่มวัสดุ
$("#frmAddStock").submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "ajax/add_stock.php",
        data: $("#frmAddStock").serialize(),
        success: function(result) {
            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            } else {
                alert('รหัสซ้ำ');
            }
        }
    });


});

$("#frmEditStock").submit(function(e) {
    e.preventDefault();
    $(':disabled').each(function(e) {
        $(this).removeAttr('disabled');
    })
    $.ajax({
        type: "POST",
        url: "ajax/edit_stock.php",
        data: $("#frmEditStock").serialize(),
        success: function(result) {

            if (result.status == 1) // Success
            {
                alert(result.message);
                window.location.reload();
                // console.log(result.message);
            }
        }
    });

});
</script>