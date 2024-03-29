<div class="modal fade bd-example-modal-xl" tabindex="-1" id="modal_edit" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content w3-flat-turquoise">
            <div class="modal-header bg-gradient-secondary">
                <h5 class="modal-title">รับชำระหนี้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="frmEditSO" id="frmEditSO" method="POST" style="padding:0px;" action="javascript:void(0);">
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="so-tab" data-toggle="tab" href="#so" role="tab"
                                aria-controls="so" aria-selected="true">ใบสั่งขายสินค้า</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="rp-tab" data-toggle="tab" href="#rp" role="tab" aria-controls="rp"
                                aria-selected="false">งวดการผ่อน</a>
                        </li>
                    </ul>
                    <!-- <button type="button" id="btnCancle" style="display:none;" class="btn btn-danger"><i
                            class="fa fa-check-circle" aria-hidden="true"></i>
                        ยกเลิกใบสั่งขาย</button> -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="so" role="tabpanel" aria-labelledby="so-tab">
                            <br>
                            <button type="submit" formaction="invoice-print.php" id="btnPrint" style="display:none;"
                                class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Print ใบสั่งขาย
                            </button>
                            <button type="submit" formaction="../so_approve/invoice-print.php" id="btnInvoice"
                                style="display:none;" class="btn btn-primary"><i class="fa fa-print"
                                    aria-hidden="true"></i>
                                Print ใบกำกับภาษี
                            </button>
                            <button type="submit" formaction="../so_approve/invoice-print.php"
                                class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i>
                                Print ใบเสร็จรับเงิน
                            </button>
                            <br>
                            <br>
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label class="col-form-label">เลขที่ใบสั่งขาย</label>
                                    <input type="text" class="form-control" name="editsocode" id="editsocode" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">รหัสลูกค้า</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="editcuscode" id="editcuscode"
                                            disabled>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" data-toggle="modal"
                                                data-target="#modal_customer" type="button"><span
                                                    class="fa fa-search"></span></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">ชื่อลูกค้า</label>
                                    <input type="text" class="form-control" name="editcusname" id="editcusname"
                                        disabled>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="col-md-3">
                                    <label class="col-form-label">เบอร์ลูกค้า</label>
                                    <input type="text" class="form-control" size="4" name="edittel" id="edittel"
                                        disabled>
                                </div>
                                <div class="col-md-9">
                                    <label class="col-form-label">ที่อยู่ลูกค้า</label>
                                    <input type="text" class="form-control" size="4" name="editaddress" id="editaddress"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label class="col-form-label">วันที่สั่งซื้อ</label>
                                    <input type="date" class="form-control" size="4" name="editsodate" id="editsodate">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">วันที่นัดส่งของ</label>
                                    <input type="date" class="form-control" name="editdeldate" id="editdeldate">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">วันที่กำหนดชำระเงินงวดที่
                                        1</label>
                                    <input type="date" class="form-control" name="editpaydate" id="editpaydate">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">วันที่กำหนดชำระเงินงวดที่
                                        2</label>
                                    <input type="date" class="form-control" name="editpaydate2" id="editpaydate2">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <label class="col-form-label">การชำระเงิน</label>
                                    <select class="form-control" name="editpayment" id="editpayment">
                                        <option value="เงินสด" selected>เงินสด</option>
                                        <option value="เครดิต">เครดิต</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="col-form-label">สกุลเงิน</label>
                                    <select class="form-control" name="editcurrency" id="editcurrency">
                                        <option value="บาท" selected>บาท</option>
                                        <option value="ดอลล่า">ดอลล่า</option>
                                        <option value="เยน">เยน</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">ภาษี </label>
                                    <div class="radio">
                                        <label class="radio-inline">
                                            <input type="radio" name="editvat" value="Y" checked> มี
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="editvat" value="N"> ไม่มี
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">หมายเหตุ:</label>
                                    <textarea class="form-control" rows="2" name="editremark"
                                        id="editremark"></textarea>
                                </div>

                            </div>

                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12">

                                    <button type="button" id="btnAddSOdetail2" class="btn btn-success"
                                        data-toggle="modal" data-target="#modal_stock2"><i class="fa fa fa-tags"
                                            aria-hidden="true"></i>
                                        เพิ่มรายการ</button>

                                    <!-- <button type="button" id="btnAddSOGiveaway2" class="btn btn-info" data-toggle="modal"
                                data-target="#modal_giveaway2"><i class="fa fa fa-gift" aria-hidden="true"></i>
                                เพิ่มของแถม</button> -->

                                </div>
                            </div>
                            <br>

                            <table name="tableEditSODetail" id="tableEditSODetail"
                                class="table table-bordered table-striped">
                                <thead style="background-color:#D6EAF8;">
                                    <tr>
                                        <th style="width:5%;text-align:center">ลำดับ</th>
                                        <th style="width:10%;text-align:center">รหัสสินค้า</th>
                                        <th style="width:20%;text-align:center">รายการสินค้า</th>
                                        <th style="width:7%;text-align:center">จำนวน</th>
                                        <th style="width:15%;text-align:center">หน่วย</th>
                                        <th style="width:9%;text-align:center">ราคาขาย</th>
                                        <th style="width:10%;text-align:center">ส่วนลด</th>
                                        <th style="width:10%;text-align:center">จำนวนเงิน</th>
                                        <th style="width:15%;text-align:center">คลังสินค้า</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="rp" role="tabpanel" aria-labelledby="rp-tab">
                            <br>
                            <table class="table table-bordered table-striped">
                                <thead bgcolor="#c2f8be">
                                    <th>
                                        ลำดับ
                                    </th>
                                    <th>
                                        วันที่กำหนดชำระเงิน
                                    </th>
                                    <th>
                                        จำนวนเงิน
                                    </th>
                                    <th>
                                        จ่ายแล้ว
                                    </th>
                                    <th>
                                        คงเหลือ
                                    </th>
                                    <th colspan="2">

                                    </th>
                                </thead>
                                <tbody bgcolor="#fefbc7">

                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            1 ก.พ. 2566
                                        </td>
                                        <td>
                                            3000
                                        </td>
                                        <td>
                                            3000
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>

                                        <button type="button" class="btn btn-primary"><i class='fas fa-hand-holding-usd'></i> Pay</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success"><i class='fas fa-file-invoice-dollar'></i> ออกใบเสร็จ</button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            7 ก.พ. 2566
                                        </td>
                                        <td>
                                            3000
                                        </td>
                                        <td>
                                            3000
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>

                                        <button type="button" class="btn btn-primary"><i class='fas fa-hand-holding-usd'></i> Pay</button>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-success"><i class='fas fa-file-invoice-dollar'></i> ออกใบเสร็จ</button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            14 ก.พ. 2566
                                        </td>
                                        <td>
                                            3000
                                        </td>
                                        <td>
                                            2000
                                        </td>
                                        <td>
                                            1000
                                        </td>
                                        <td>

                                        <button type="button" class="btn btn-primary"><i class='fas fa-hand-holding-usd'></i> Pay</button>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-success"><i class='fas fa-file-invoice-dollar'></i> ออกใบเสร็จ</button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            21 ก.พ. 2566
                                        </td>
                                        <td>
                                            3000
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td>
                                            3000
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-primary"><i class='fas fa-hand-holding-usd'></i> Pay</button>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-success"><i class='fas fa-file-invoice-dollar'></i> ออกใบเสร็จ</button>

                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>


                    <!-- <table name="tableEditSOGiveaway" id="tableEditSOGiveaway" style="display:none;"
                        class="table table-bordered table-striped">
                        <thead style="background-color:#D6EAF8;">
                            <tr>
                                <th style="width:7%;text-align:center">ลำดับ</th>
                                <th style="width:8%;text-align:center">รหัสสินค้า</th>
                                <th style="width:30%;text-align:left">รายการสินค้า</th>
                                <th style="width:10%;text-align:center">จำนวน</th>
                                <th style="width:12%;text-align:center">หน่วย</th>
                                <th style="width:15%;text-align:center">คลังสินค้า</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table> -->
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" form="frmEditSO" class="btn btn-primary">แก้ไข</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>