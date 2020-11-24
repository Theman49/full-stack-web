function newLine(){
    document.write("<br>");
}


// var d = new Date();
// document.write(d);
// newLine();
// document.write(d.getDay());
// newLine();
// document.write(d.getDate());
// newLine();
// document.write(d.getHours());
// var day = d.getDay();
// var weekdays = ["Sunday","Monday","Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

// newLine();
// document.write(weekdays[day]);

// var myExp = new RegExp("Kallob", "g");
// or var myExp = /Kallob/g;
// var myExp = /l{2}/g;
// var test = myExp.test("my name is Kallob");

// modifiers --> g (global) and i (case Insensitive or Ignore-Case)

// var myExp = /\s/gi;
// var myExp = /sentencE/gi;
// var str = document.getElementById("p").innerText;
// alert(str.replace(myExp, "string"));

// var myExp = /\s/gi;
// var str = document.getElementById("p").innerText;
// var match = str.match(myExp);
// var matches = match.length;
// alert(matches);

// var navigatorInfo = "appCodeName : " + navigator.appCodeName + "<br>";
// navigatorInfo += "appName (Browser Name) : " + navigator.appName + "<br>";
// navigatorInfo += "appVersion : " + navigator.appVersion + "<br>";
// navigatorInfo += "cookieEnabled : " + navigator.cookieEnabled + "<br>";
// navigatorInfo += "platform : " + navigator.platform + "<br>";
// navigatorInfo += "userAgent : " + navigator.userAgent + "<br>";
// navigatorInfo += "onLine : " + navigator.onLine + "<br>";

// document.getElementById("p").innerHTML = navigatorInfo;

// function time(){
//     var d = new Date();
//     var hour = d.getHours();
//     var minute = d.getMinutes();
//     var second = d.getSeconds();
//     if(second < 10){
//         second = "0" + second;
//     }
//     var str = hour + ":" + minute + ":" + second;
//     document.getElementById("p").innerHTML = str;
// }

// var initiate = setInterval(function() {time();}, 1000);
// or var initiate = setInterval("time();", 1000);
// var delayedAlert = setTimeout("alert(\"delayed 3 seconds\")", 3000);
// or var delayedAlert = setTimeout("alert('delayed 3 seconds')", 3000);

// var myWallet = {
//     cards: {
//         visa: 1,
//         mastercard : 1,
//         ktm: 1,
//         debit: 0,
//         sim: 1
//     },
//     cash: {
//         Rupiah: 150000,
//         Dollar: 10,
//         Euros: 0
//     },
//     id: "yes"
// };

// alert(myWallet.cash.Rupiah);
// alert(myWallet['cash']['Dollar']);

function newAjax(){
    var ajax;
    if(window.XMLHttpRequest){
        // this is for IE 7+, Chrome, Safari, and Firefox
        ajax = new XMLHttpRequest();
    } else {
        // this is for IE 5 and IE 6
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return ajax;
}

function loadMe(){
    var ajaxHandler = newAjax();
    ajaxHandler.onreadystatechange = function(){
        if(ajaxHandler.readyState == 4 && ajaxHandler.status == 200){
            document.getElementById("loadMe").innerHTML = ajaxHandler.responseText;
        }
    }
    ajaxHandler.open("GET", "second.html", true);
    ajaxHandler.send();
}