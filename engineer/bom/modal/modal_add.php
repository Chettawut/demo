<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_add" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">เพิ่มวัตถุดิบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmAddStock" id="frmAddStock" method="POST" style="padding:10px;" action="javascript:void(0);">
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table id="table_stock" name="table_stock" class="table table-bordered table-striped">
                                <thead style=" background-color:#D6EAF8;">
                                    <tr>
                                        <th width="20%">รหัสพัสดุ</th>
                                        <th width="40%">ชื่อพัสดุ</th>
                                        <th width="20%">หน่วยสินค้า</th>
                                        <th width="20%">ประเภทสินค้า</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" id="btnAddSo" form="frmAddStock" class="btn btn-primary">ตกลง</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>