<div id="divfrmSO" style="display:none;">
    <form name="frmSO" id="frmSO" onkeydown="return event.key != 'Enter';">

        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="recipient-name" class="col-form-label">เลขที่ใบสั่งขาย</label>
                <input type="text" class="form-control" name="socode" id="socode" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>รหัสลูกค้า</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="cuscode" id="cuscode" disabled>
                    <span class="input-group-btn">
                        <button class="btn btn-default" data-toggle="modal" data-target="#modal_one" type="button"><span
                                class="fa fa-search"></span></button>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">ชื่อลูกค้า</label>
                <input type="text" class="form-control" name="tdname" id="tdname" disabled>
            </div>

        </div>
        <div class="form-group col-md-3">
            <label for="recipient-name" class="col-form-label">เบอร์ลูกค้า</label>
            <input type="text" class="form-control" size="4" name="tel" id="tel" disabled>
        </div>
        <div class="form-group col-md-9">
            <label for="recipient-name" class="col-form-label">ที่อยู่ลูกค้า</label>
            <input type="text" class="form-control" size="4" name="address" id="address" disabled>
        </div>


        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="recipient-name" class="col-form-label">วันที่สั่งขาย</label>
                <input type="date" class="form-control" size="4" name="sodate" id="sodate">
            </div>
            <div class="form-group col-md-3">
                <label for="recipient-name" class="col-form-label">วันที่นัดส่งของ</label>
                <input type="date" class="form-control" name="deldate" id="deldate">
            </div>
            <div class="form-group col-md-3">
                <label for="recipient-name" class="col-form-label">วันที่กำหนดชำระเงินงวดที่
                    1</label>
                <input type="date" class="form-control" name="paydate" id="paydate">
            </div>
            <div class="form-group col-md-3">
                <label for="recipient-name" class="col-form-label">วันที่กำหนดชำระเงินงวดที่
                    2</label>
                <input type="date" class="form-control" name="paydate2" id="paydate2">
            </div>



        </div>

        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="recipient-name" class="col-form-label">การชำระเงิน</label>
                <select class="form-control" name="payment" id="payment">
                    <option value="เงินสด" selected>เงินสด</option>
                    <option value="เครดิต">เครดิต</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="recipient-name" class="col-form-label">สกุลเงิน</label>
                <select class="form-control" name="currency" id="currency">
                    <option value="บาท" selected>บาท</option>
                    <option value="ดอลล่า">ดอลล่า</option>
                    <option value="เยน">เยน</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="recipient-name" class="col-form-label">ภาษี </label>
                <div class="radio">
                    <label class="radio-inline">
                        <input type="radio" name="vat" value="Y"> มี
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="vat" value="N"> ไม่มี
                    </label>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="comment">หมายเหตุ:</label>
                <textarea class="form-control" rows="5" name="remark" id="remark"></textarea>
            </div>
            <input type="hidden" id="salecode" name="salecode" value="<?php echo $_SESSION['salecode'];?>">




        </div>

        <hr>
        <hr>

        <br>
        <br>
        <div class="form-group col-md-12">
            <button type="button" id="btnAddSOdetail" class="btn btn-success" data-toggle="modal"
                data-target="#modal_stock"><i class="fa fa fa-tags" aria-hidden="true"></i>
                เพิ่มรายการ</button>

            <button type="button" id="btnAddSOGiveaway" class="btn btn-info" data-toggle="modal"
                data-target="#modal_giveaway"><i class="fa fa fa-gift" aria-hidden="true"></i>
                เพิ่มของแถม</button>

        </div>



        <div style="border: 1px solid #FAEBD7;">
            <br>

            <table name="tableSODetail" id="tableSODetail" class="table table-bordered table-striped">
                <thead style="background-color:#D6EAF8;">
                    <tr>
                        <th style="width:5%;text-align:center">ลำดับ</th>
                        <th style="width:10%;text-align:center">รหัสสินค้า</th>
                        <th style="width:25%;text-align:center">รายการสินค้า</th>
                        <th style="width:10%;text-align:center">จำนวน</th>
                        <th style="width:15%;text-align:center">หน่วย</th>
                        <th style="width:10%;text-align:center">ราคาขาย</th>
                        <th style="width:10%;text-align:center">ส่วนลด</th>
                        <th style="width:10%;text-align:center">จำนวนเงิน</th>
                        <th style="width:5%;text-align:center"></th>

                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>

            <table name="tableSOGiveaway" id="tableSOGiveaway" class="table table-bordered table-striped"
                style="display:none;">
                <thead style="background-color:#D6EAF8;">
                    <tr>
                        <th style="width:5%;text-align:center">ลำดับ</th>
                        <th style="width:10%;text-align:center">รหัสสินค้า</th>
                        <th style="width:55%;text-align:left">รายการสินค้า</th>
                        <th style="width:10%;text-align:center">จำนวน</th>
                        <th style="width:15%;text-align:center">หน่วย</th>
                        <th style="width:5%;text-align:center"></th>


                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>

            <br>
            <br>
            <br>

            <div style="text-align:right;">

                <input type="submit" class="btn btn-primary" value="ยืนยัน">
            </div>
            <br>
            <br>
            <br>
    </form>
</div>