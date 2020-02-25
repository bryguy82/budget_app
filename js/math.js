/**
 * @param {Present value} PV 
 * @param {Rate} r 
 * @param {Number of periods} n 
 */
function FV(PV, r, n) {
    var x = (1 + r / 100)
    var FV = PV * (Math.pow(x, n))
    return FV;
}

/**
 * Get and put values to calculate
 */
function cal_FV() {
    var rate = parseFloat(document.getElementById("rate").value);
    var num_periods = parseInt(document.getElementById("periods").value);
    var payment = parseInt(document.getElementById("payment").value);
    var pvalue = parseFloat(document.getElementById("present_value").value);

    if (rate == 0) {
        fv = (pvalue + (payment * num_periods))
        document.getElementById("future_value").value = fv;
    } else {
        var fvalue = FV(pvalue, rate, num_periods);
        var fv = fvalue.toFixed(2);
        document.getElementById("future_value").value = fv;
    }
}

/**
 * Function to calculate total number of payments.
 * @param {Interest rate} rate 
 * @param {Number of periods} per 
 * @param {Payment/deposit amount} pmt 
 * @param {Present value} pv 
 * @param {Future value} fv 
 */
function nper() {
    rate = parseFloat(document.getElementById("nrate").value);
    fv = parseFloat(document.getElementById("nfuture_value").value);
    pmt = -parseFloat(document.getElementById("npayment").value);
    pv = parseFloat(document.getElementById("npresent_value").value);
    // per = parseFloat(document.getElementById("").value);
    if (pmt == 0) {
        document.getElementById("nperiods").value = 0;
    } else {
        rate = eval(rate / 100);
        if (rate == 0) { // Interest rate is 0
            nper_value = -(fv + pv) / pmt;
        } else {
            nper_value = Math.log((pmt - fv * rate) / (pmt + rate * pv)) / Math.log(1 + rate);
        }
        nper_value = nper_value.toFixed(2);
        document.getElementById("nperiods").value = nper_value;
    }
}

function conv_number(expr, decplaces) {
    var str = "" + Math.round(eval(expr) * Math.pow(10, decplaces));
    while (str.length <= decplaces) {
        str = "0" + str;
    }
    var decpoint = str.length - decplaces;
    return (str.substring(0, decpoint) + "." + str.substring(decpoint, str.length));
}


// /**
//  * Used to calculate the number of periods
//  */
// function periods(float $rate, float $payment, float $present_value, float $future_value, bool $beginning = false): float {
//     $when = $beginning ? 1 : 0;
//     if ($rate == 0) {
//         return -($present_value + $future_value) / $payment;
//     }
//     $initial = $payment * (1.0 + $rate * $when);
//     return log(($initial - $future_value * $rate) / ($initial + $present_value * $rate)) / log(1.0 + $rate);
// }