$(document).ready(function() {
    $("#calculate").click(function() {
        var scholartype = $("#st").val();
        var payment_type = $("#ps").val();
        var miscfee = $("#mfee").val();
        var thesisfee = $("#tfee").val();
        var nstpfee = $("#nfee").val();
        var labfee = $("#lfee").val();
        var totalunits = $("#nbruhunit").val();
        var standardTf = (parseFloat(totalunits) * 800);
        var surCharge15 = 0.15;
        var tuitionfee = 0;
        var surCharge = $("#15sc").val();
        if (scholartype === "No Scholarship" && (payment_type === "Full Payment" || payment_type === "Installment")) {
            tuitionfee = standardTf;
        } else if (scholartype === "Half Scholarship" && (payment_type === "Full Payment" || payment_type === "Installment")) {
            tuitionfee = (standardTf * 0.575);
        } else if (scholartype === "Full Scholarship" && (payment_type === "Full Payment" || payment_type === "Installment")) {
            tuitionfee = (standardTf - (standardTf * 1));
        }
        var totalfee = parseFloat(miscfee) + parseFloat(thesisfee) + parseFloat(nstpfee) + parseFloat(labfee) + parseFloat(tuitionfee);
        var total = (payment_type === "Installment") ? parseFloat(totalfee) * parseFloat(surCharge15) : parseFloat(surCharge);
        $("#ttfee").val(tuitionfee.toFixed(2));
        $("#ttlfee").val(totalfee.toFixed(2));
        var installmentBreakdown = 0.00;
        if (payment_type === "Installment") {
            installmentBreakdown = ((parseFloat(total) + parseFloat(totalfee)) / 3).toFixed(2);
            $("#15sc").val(total.toFixed(2));
        } else if (payment_type === "Full Payment") {
            $("#15sc").val(0);
        }
        $(".breakdown").val(installmentBreakdown);
    });
});