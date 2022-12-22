<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_add" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">เพิ่มข้อมูลใบเบิก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="max-height: 700px;overflow-y: auto;">
                <form name="frmPO" id="frmPO" onkeydown="return event.key != 'Enter';">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>เลขที่ใบเบิก</label>
                            <input type="text" class="form-control" name="pocode" id="pocode" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>วันที่เบิก</label>
                            <input type="date" class="form-control" size="4" name="podate" id="podate" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>เวลาเบิก</label>
                            <input type="date" class="form-control" size="4" name="podate" id="podate" required>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Cost Project</label>
                            <select class="form-control" name="payment" id="payment">
                                <option value="เงินสด" selected>เงินสด</option>
                                <option value="30 วัน">30 วัน</option>
                                <option value="45 วัน">45 วัน</option>
                                <option value="60 วัน">60 วัน</option>
                                <option value="90 วัน">90 วัน</option>
                                <option value="120 วัน">120 วัน</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>หมายเหตุ</label>
                            <input type="date" class="form-control" name="deldate" id="deldate" required>
                        </div>



                    </div>

                    <div class="form-group col-md-12">
                        <button type="button" id="btnAddPOdetail" class="btn btn-success" data-toggle="modal"
                            data-target="#modal_stock"><i class="fa fa fa-tags" aria-hidden="true"></i>
                            เพิ่มรายการ</button>
                    </div>



                    <table name="tablePoDetail" id="tablePoDetail" class="table table-bordered table-striped">
                        <thead style="background-color:#D6EAF8;">
                            <tr >
                                <th>ลำดับ</th>
                                <th>รหัสสินค้า</th>
                                <th width="15%">ชื่อพัสดุ</th>
                                <th>Cost Project ที่ใช้</th>
                                <th>จำนวนเบิก</th>
                                <th>หน่วย</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col text-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" id="btnAddSo" form="frmPO" class="btn btn-primary">ตกลง</button>
                </div>
            </div>

        </div>
    </div>
</div>