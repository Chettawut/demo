<script>
//modal เปิดซ้อนกันได้
$(document).on('show.bs.modal', '.modal', function() {
    const zIndex = 1040 + 10 * $('.modal:visible').length;
    $(this).css('z-index', zIndex);
    setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass(
        'modal-stack'));
});

$(document).ajaxStart(function() {
    Pace.restart()
})

$(function() {

    $("#sideHR").show()


    // $.ajax({
    //     type: "POST",
    //     url: "ajax/getDepartment.php",
    //     success: function(result) {
    //         let depid=''
    //         let html=''

    //         for (count = 0; count < result.empcode.length; count++) {

    //             if (depid != result.depid[count] && count!=0) 
    //             html +='</tbody></table></div></td></tr>';

    //             if (depid != result.depid[count]) {
    //                 html +='<tr data-widget="expandable-table" aria-expanded="false"><td><i class = "expandable-table-caret fas fa-caret-right fa-fw"></i>' +
    //                     result.depname[count]+
    //                     '</td></tr> <tr class="expandable-body"><td><div class="p-0"><table class="table"><tbody>';
    //             }
    //             depid = result.depid[count]
    //             html +='<tr><td>'+result.empname[count]+' '+depid+'</td></tr>';




    //         }
    //         $("#listperson #tlist").append(html)

    //         // setTimeout(function() {
    //         //     $('#expandable-table-header-row').ExpandableTable('toggleRow')
    //         // }, 1000);



    //         // console.log(html)


    //     }
    // });



});

$("#btnAdd").click(function() {
    $("#txtCode").prop('disabled', false);
    $("#CancleEmp").hide();
    $("#txtCode").val();
    $('#frmEmployee')[0].reset();
    $("#spanCode").show();
    $("#btnMenu").show();
    $("#spanEditCode").hide();
    $("#btnSubmit").show();
    $("#btnEdit").hide();
    $("#lbCheck").hide();



    $("#frmMenu").fadeIn(10, function() {
        $("#menuName").text('Human Resources (HR) เพิ่มพนักงาน');
        $("#frmList").removeClass();
        $("#frmList").addClass("col-sm-6 col-md-3 col-sm-6 col-md-3");

    });


});

$("#frmEmployee").submit(function() {

    // alert($("#frmEmployee").serialize())
    if ($("#lbCheck").text() == 'สามารถใช้รหัสพนักงานนี้ได้') {
        
        $.ajax({
            type: "POST",
            url: "ajax/addEmployee.php",
            data: $("#frmEmployee").serialize(),
            success: function(result) {
                if (result.status == 1) // Success
                {
                    alert('เพิ่มพนักงานรหัส ' + result.message + ' เรียบร้อยแล้ว');
                    clickRefresh();
                } else // Err
                {
                    alert(result.message);
                }
                // alert(result);
            }
        });
    }
    else
    {
        alert('รหัสพนักงานซ้ำ!!');
        $("#txtCode").focus();
    }
});

$("#btnEdit").click(function() {
    $(':disabled').each(function(event) {
        $(this).removeAttr('disabled');
    });
    // alert($("#EmpEnd").val())
    // alert($("#frmEmployee").serialize())
    $.ajax({
        type: "POST",
        url: "ajax/editEmployee.php",
        data: $("#frmEmployee").serialize(),
        success: function(result) {
            // alert(result)
            if (result.status == 1) // Success
            {
                alert('แก้ไขพนักงานรหัส ' + result.message + ' เรียบร้อยแล้ว');
                clickRefresh();
            } else // Err
            {
                alert(result.message);
            }
            // alert(result);
        }
    });

});

$("#txtCode").change(function() {
    if ($('#txtCode').val() != '') {
        $.ajax({
            url: "ajax/checkempcode.php",
            type: "POST",
            data: {
                checkEmpCode: $('#txtCode').val()
            },
            success: function(data) {
                if (data == 1) {
                    $('#lbCheck').html('สามารถใช้รหัสพนักงานนี้ได้');
                    $('#lbCheck').css({
                        "color": "green",
                        "font-size": "150%"
                    });
                    $('#lbCheck').show();
                    $('#btnSubmit').removeClass('btn btn-primary disabled');
                    $('#btnSubmit').addClass('btn btn-primary active');

                    // alert("Data: " + data + "\nStatus: ");
                } else {
                    $('#lbCheck').html('รหัสพนักงานซ้ำ!!');
                    $('#lbCheck').css({
                        "color": "red",
                        "font-size": "150%"
                    });
                    $('#lbCheck').show();
                    $('#btnSubmit').removeClass('btn btn-primary active');
                    $('#btnSubmit').addClass('btn btn-primary disabled');
                    // alert("Data: " + data + "\nStatus: ");
                }

            },
            error: function() {
                alert("There was an error. Try again please!");
            }
        });
    } else {
        $('#lbCheck').html('กรุณาใส่รหัสพนักงาน!!');
        $('#lbCheck').css({
            "color": "red",
            "font-size": "150%"
        });
        $('#lbCheck').show();
        $('#btnSubmit').removeClass('btn btn-primary active');
        $('#btnSubmit').addClass('btn btn-primary disabled');
    }
});

$("#btnReset").click(function() {
    $("#frmList").removeClass();
    $("#frmList").addClass("col-md-12");
    // $("#btnReset").hide()
    $("#frmMenu").hide()
});

function onclickEditEmployee(empcode) {
    // alert(empcode);
    $("#CancleEmp").show();
    $("#spanCode").hide();
    $("#spanEditCode").show();
    $("#btnSubmit").hide();
    $("#btnEdit").show();
    $("#btnMenu").show();
    $("#menuName").text('Human Resources (HR) แก้ไขพนักงาน');

    $.ajax({
        type: "POST",
        url: "ajax/get_Employee.php",
        data: {
            empCode: empcode
        },
        success: function(result) {
            $("#txtCode").val(result.empcode);
            $("#txtEditCode").val(result.empcode);
            $("#EmpName").val(result.EmpName);
            $("#LastName").val(result.LastName);
            $("#ETitleName").val(result.ETitleName);
            $("#EmpNameEN").val(result.EmpNameEN);
            $("#LastNameEN").val(result.LastNameEN);
            $("#ETitleNameEN").val(result.ETitleNameEN);
            $("#SECODE").val(result.SECODE);
            $("#EmpPosition").val(result.EmpPosition);
            $("#DepCode").val(result.DepCode);
            $("#WorkAt").val(result.WorkAt.replace(/^\s+|\s+$/gm, ''));
            $("#EmpTestDate").val(result.EmpTestDate);
            setEmpFirstDate();
            $("#EmpNickName").val(result.EmpNickName);
            $("#EmpBirth").val(result.EmpBirth);
            $("#Weight").val(result.Weight);
            $("#Height").val(result.Height);
            $("#TaxCode").val(result.TaxCode);
            $("#EmpBirthPlace").val(result.EmpBirthPlace);
            $("#SocialCode").val(result.SocialCode);
            $("#EmpPublicCode").val(result.EmpPublicCode);
            $("#HospitalCode").val(result.HospitalCode);
            $("#Citizen").val(result.Citizen);
            $("#Nationality").val(result.Nationality);
            $("#Religion").val(result.Religion);
            $("#Blood").val(result.Blood);
            $("#EmpStatus").val(result.EmpStatus.replace(/^\s+|\s+$/gm, ''));
            $("#Mobile").val(result.Mobile);
            $("#Conscripted").val(result.Conscripted);
            $("#Ability").val(result.Ability);
            $("#AbilityComputer").val(result.AbilityComputer);
            $("#Hobbies").val(result.Hobbies);
            $("#Sports").val(result.Sports);
            $("#TypingTH").val(result.TypingTH);
            $("#TypingEN").val(result.TypingEN);

            if (result.LicenceCar !== '') {
                $("#checkLicenceCar").prop('checked', true);
                $("#LicenceCar").attr("disabled", false);
                $("#LicenceCar").val(result.LicenceCar);
            } else {
                $("#checkLicenceCar").prop('checked', false);
                $("#LicenceCar").attr("disabled", true);
                $("#LicenceCar").val('');

            }

            if (result.LicenceMotorcy !== '') {
                $("#checkLicenceMotorcy").prop('checked', true);
                $("#LicenceMotorcy").attr("disabled", false);
                $("#LicenceMotorcy").val(result.LicenceMotorcy);
            } else {
                $("#checkLicenceMotorcy").prop('checked', false);
                $("#LicenceMotorcy").attr("disabled", true);
                $("#LicenceMotorcy").val('');
            }
            $("#MemberFamily").val(result.MemberFamily);
            $("#ChildFamily").val(result.ChildFamily);
            $("#Sex").val(result.Sex.replace(/^\s+|\s+$/gm, ''));
            $("#EmpLevel").val(result.EmpLevel.replace(/^\s+|\s+$/gm, ''));
            $("#Son").val(result.Son);
            $("#Daughter").val(result.Daughter);
            // alert(result.SpeakTH);
            $("#SpeakTH").val(result.SpeakTH);
            $("#ReadTH").val(result.ReadTH);
            $("#WriteTH").val(result.WriteTH);
            $("#SpeakEN").val(result.SpeakEN);
            $("#ReadEN").val(result.ReadEN);
            $("#WriteEN").val(result.WriteEN);

            $("#AddID1").val(result.AddID1);
            $("#AddAlley1").val(result.AddAlley1);
            $("#AddRoad1").val(result.AddRoad1);
            $("#AddSubDistrict1").val(result.AddSubDistrict1);
            $("#AddDistrict1").val(result.AddDistrict1);
            $("#AddProvince1").val(result.AddProvince1);
            $("#AddZip1").val(result.AddZip1);
            $("#AddPhone1").val(result.AddPhone1);

            $("#AddID2").val(result.AddID2);
            $("#AddAlley2").val(result.AddAlley2);
            $("#AddRoad2").val(result.AddRoad2);
            $("#AddSubDistrict2").val(result.AddSubDistrict2);
            $("#AddDistrict2").val(result.AddDistrict2);
            $("#AddProvince2").val(result.AddProvince2);
            $("#AddZip2").val(result.AddZip2);
            $("#AddPhone2").val(result.AddPhone2);

            $("#FirstName3").val(result.FirstName3);
            $("#LastName3").val(result.LastName3);
            $("#Occupation3").val(result.Occupation3);
            $("#Mobile3").val(result.Mobile3);

            $("#FirstName4").val(result.FirstName4);
            $("#LastName4").val(result.LastName4);
            $("#Occupation4").val(result.Occupation4);
            $("#Mobile4").val(result.Mobile4);

            $("#FirstName5").val(result.FirstName5);
            $("#LastName5").val(result.LastName5);
            $("#Occupation5").val(result.Occupation5);
            $("#Mobile5").val(result.Mobile5);

            $("#FirstName6").val(result.FirstName6);
            $("#LastName6").val(result.LastName6);
            $("#Occupation6").val(result.Occupation6);
            $("#Mobile6").val(result.Mobile6);

            $("#EdoName1").val(result.EdoName1);
            $("#EdoBackground1").val(result.EdoBackground1);
            $("#EdoDepartment1").val(result.EdoDepartment1);
            $("#EdoYearIn1").val(result.EdoYearIn1);
            $("#EdoYearOut1").val(result.EdoYearOut1);
            $("#EdoAvgGrade1").val(result.EdoAvgGrade1);

            $("#EdoName2").val(result.EdoName2);
            $("#EdoBackground2").val(result.EdoBackground2);
            $("#EdoDepartment2").val(result.EdoDepartment2);
            $("#EdoYearIn2").val(result.EdoYearIn2);
            $("#EdoYearOut2").val(result.EdoYearOut2);
            $("#EdoAvgGrade2").val(result.EdoAvgGrade2);

            $("#EdoName3").val(result.EdoName3);
            $("#EdoBackground3").val(result.EdoBackground3);
            $("#EdoDepartment3").val(result.EdoDepartment3);
            $("#EdoYearIn3").val(result.EdoYearIn3);
            $("#EdoYearOut3").val(result.EdoYearOut3);
            $("#EdoAvgGrade3").val(result.EdoAvgGrade3);

            $("#EdoName4").val(result.EdoName4);
            $("#EdoBackground4").val(result.EdoBackground4);
            $("#EdoDepartment4").val(result.EdoDepartment4);
            $("#EdoYearIn4").val(result.EdoYearIn4);
            $("#EdoYearOut4").val(result.EdoYearOut4);
            $("#EdoAvgGrade4").val(result.EdoAvgGrade4);

            $("#WorkName1").val(result.WorkName1);
            $("#WorkStartSalary1").val(result.WorkStartSalary1);
            $("#WorkStopSalary1").val(result.WorkStopSalary1);
            $("#WorkPosition1").val(result.WorkPosition1);
            $("#WorkDetail1").val(result.WorkDetail1);
            $("#WorkReason1").val(result.WorkReason1);

            $("#WorkName2").val(result.WorkName2);
            $("#WorkStartSalary2").val(result.WorkStartSalary2);
            $("#WorkStopSalary2").val(result.WorkStopSalary2);
            $("#WorkPosition2").val(result.WorkPosition2);
            $("#WorkDetail2").val(result.WorkDetail2);
            $("#WorkReason2").val(result.WorkReason2);

            $("#WorkName3").val(result.WorkName3);
            $("#WorkStartSalary3").val(result.WorkStartSalary3);
            $("#WorkStopSalary3").val(result.WorkStopSalary3);
            $("#WorkPosition3").val(result.WorkPosition3);
            $("#WorkDetail3").val(result.WorkDetail3);
            $("#WorkReason3").val(result.WorkReason3);



            // alert(result.empcode);

        }
    });

    $("#frmMenu").show();
    $("#frmList").removeClass();
    $("#frmList").addClass("col-sm-6 col-md-3 col-sm-6 col-md-3");

    // $("#frmList").removeClass();
    // $("#frmList").addClass("col-md-3");
    // $("#btnReset").show()
    // $("#frmMenu").show()
    window.scrollTo(0,0);
    $("#txtCode").prop('disabled', true);
    
}

$("#EmpTestDate").change(function() {
    setEmpFirstDate();
});

function setEmpFirstDate() {
    var EmpTestDate = new Date(document.getElementById("EmpTestDate").value);
    EmpTestDate.setDate(EmpTestDate.getDate() + 119);
    let formatted_date;
    if (EmpTestDate.getMonth() < 9) {
        if (EmpTestDate.getDate() < 10)
            formatted_date = EmpTestDate.getFullYear() + "-0" + (EmpTestDate.getMonth() + 1) + "-0" +
            EmpTestDate
            .getDate();
        else
            formatted_date = EmpTestDate.getFullYear() + "-0" + (EmpTestDate.getMonth() + 1) + "-" + EmpTestDate
            .getDate();
    } else {
        if (EmpTestDate.getDate() < 10)
            formatted_date = EmpTestDate.getFullYear() + "-" + (EmpTestDate.getMonth() + 1) + "-0" + EmpTestDate
            .getDate();
        else
            formatted_date = EmpTestDate.getFullYear() + "-" + (EmpTestDate.getMonth() + 1) + "-" + EmpTestDate
            .getDate();
    }

    $("#EmpFirstDate").val(formatted_date);
}
</script>