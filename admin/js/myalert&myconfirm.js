/******************* This Alert Modal Created By VIKAS SETH ********************/


/********************* myalert() code *************************/

function myalert(msg, type, link) {

    //alert css
    var css;
    css =
        ".myalert{visibility:visible;width:100%;height:100%;position:fixed;top:0;left:0;z-index:99999;background-color: rgba(0,0,0,0.4);box-sizing:border-box;opacity:1;transition:all .6s;}";

    //alert content css
    css +=
        ".myalert-content{background-color: #fff;min-width: 300px;max-width:400px;width: 33%;margin: auto;margin-top:20px;box-sizing: border-box;border: 1px solid #555;overflow: hidden;border-radius: 4px;box-shadow: 0 0 3px #555;padding:7px;text-align: center;animation:rr .6s;}";

    //alert header,body,footer css
    css +=
        ".myalert-header,.myalert-body,.myalert-footer{padding: 10px;box-sizing: border-box;color: #111;min-height: 30px;}.myalert-header h2{margin:.4em;color:#444;}.myalert-body p{margin:2px;}.myalert-body{padding-top:0;}" +

        //alert entry animation
        "@keyframes rr { from {margin-top:-400px;}  }";

    //alert-symbol css
    css +=
        ".alert-symbol{width: 70px;height: 70px;border: 3px solid;color: #F66358;border-radius: 50%;padding: 5px;display:inline-block;line-height:60px;animation:ror 1.5s;}.alert-symbol::before{content:'!';font-size:50px;}" +
        "@keyframes ror { from{transform:rotate(-360deg) scale(.5);} }";
    
    if (type === "error") {
        css+= 
            ".alert-symbol{color:#f44336;line-height:55px;}.alert-symbol::before{content:\'\u2716\';font-size:35px;}";
    } else if (type === "success") {
        css+= 
            ".alert-symbol{color:#4caf50;border-color:#81c784;line-height:55px;}.alert-symbol::before{content:\'\u2714\';font-size:40px;}";
    } else if (type === "info") {
        css+= 
            ".alert-symbol{color:#4fc3f7;line-height:55px;}.alert-symbol::before{content:'i';font-size:50px;}";
    }
    
    //alert close button css    
    css +=
        ".alert-btn{padding:9px 28px;border:1px solid;color:#fff;cursor:pointer;border-radius:4px;outline:none;font-size:14px;}" +
        ".dang{background-color:#F66358;border-color:#f44336;} .dang:hover{background-color:#f44336;}";
    
    if (type === "success" || type === "error" || type === "info") {
        css+=
        ".dang{background-color:#2196f3;border-color:#1976d2;} .dang:hover{background-color:#1976d2;}";
    }
    
    //cross button css (x)
    css +=
        ".x-btn{color:#999;cursor:pointer;float:right;margin-right:-10px;margin-top:-14px;font-size:12px;}.x-btn::after{clear:right;}.x-btn:hover{color:#000;}";

    //alert remove animation
    css += ".remove{animation:BtoT .5s !important;}" +
        "@keyframes BtoT{ from {} to {margin-top:-400px; opacity:0}}";

    // adding shaking animation css
    css += ".shake {animation: shake .6s;}.shake1 {animation: shake1 .6s;}" +
        "@keyframes shake {0%,100% {transform: translateX(0);}10%,50%,90% {transform: translateX(-6px);}30%,70% {transform: translateX(6px);}}" +
        "@keyframes shake1 {0%,100% {transform: translateX(0);}10%,50%,90% {transform: translateX(-6px);}30%,70% {transform: translateX(6px);}}";

    //check message is given or not
    if (!msg) {
        msg = "This is an alert box";
    }
    
    //changing alert heading
    var alert_heading;
    if (type === "error") { alert_heading = "Error!"; }
    else if (type === "success") { alert_heading = "Success!"; }
    else if (type === "info") { alert_heading = "Info!"; }
    else { alert_heading = "Alert!"; }
    
    //check link is given by user or not        
    if (!link) {
        link = "";
    }
    
    // checking document.onclick variable,assigned or not       
    if (document.onclick) {
        var get = document.onclick;
        get = String(get);
        get = get.replace(/\"/g, "\'");
    }

    //inserting myalert to body
    document.body.innerHTML +=
        '<div class="myalert" id="myalert">' +
        "<style>" + css + "</style>" +
        '<div class="myalert-content">' +
        '<div class="myalert-header">' +
        '<span class="x-btn" onclick="close_myalert(\'' + link +
        '\'), restore(' + get + ')">&#x2716;</span>' +
        '<div class="alert-symbol"></div>' +
        '<h2>'+ alert_heading + '</h2>' +
        '</div>' +
        '<div class="myalert-body">' +
        '<p>' + msg + '</p>' +
        '</div>' +
        '<div class="myalert-footer">' +
        '<button class="alert-btn dang" onclick ="close_myalert(\'' + link +
        '\'), restore(' + get + ')">OK</button>' +
        '</div>' +
        '</div>' +
        '</div>';

    document.onclick = checkalert;
}

//restore value of document.onclick if value is alredy defined
function restore(res) {
    if (res) {
        document.onclick = res;
    }
}


//removing alert element from body
function remove_myalert(url) {
    document.getElementById("myalert").remove();

    if (url) {
        window.location.href = url;
    }
}

//adding alert remove animation
function close_myalert(link) {
    var id = document.getElementsByClassName("myalert-content")[0];
    id.classList.add("remove");
    if (!link) {
        link = "";
    }
    setTimeout(remove_myalert.bind(null, link), 400);
}

// adding alert shakeing animation if user clicked outside from alert
function checkalert(e) {
    var alert_id = document.getElementById('myalert');
    var myalert = document.getElementsByClassName("myalert-content")[0];
    if (e.target === alert_id) {
        if (!myalert.classList.contains("shake")) {
            myalert.classList.add("shake");
            myalert.classList.remove("shake1");
        } else {
            myalert.classList.remove("shake");
            myalert.classList.add("shake1");
        }
    }
}


/******************* myconfirm() code **********************/

function myconfirm(msg, link) {
    //myconfirm  css
    var css;
    css =
        ".myconfirm{visibility:visible;width:100%;height:100%;position:fixed;top:0;left:0;z-index:99999;background-color: rgba(0,0,0,0.4);box-sizing:border-box;opacity:1;transition:all .6s;}";
    
    //myconfirm content css
    css +=
        ".myconfirm-content{background-color: #fff;min-width: 300px;max-width:400px;width: 33%;margin: auto;margin-top:20px;box-sizing: border-box;border: 1px solid #555;overflow: hidden;border-radius: 4px;box-shadow: 0 0 3px #555;padding:7px;text-align: center;animation:rr .6s;}";
    
    //myconfirm header,body,footer css
    css +=
        ".myconfirm-header,.myconfirm-body,.myconfirm-footer{padding: 10px;box-sizing: border-box;color: #111;min-height: 30px;}.myconfirm-header h2{margin:.4em;}.myconfirm-body p{margin:2px;}.myconfirm-body{padding-top:0;}" +
        //alert entry animation
        "@keyframes rr { from {margin-top:-400px;}  }";
    
    //alert-symbol css
    css +=
        ".alert-symbol{width: 70px;height: 70px;border: 3px solid;color: #F66358;border-radius: 50%;padding: 5px;display:inline-block;line-height:60px;animation:ror 1.8s;}.alert-symbol::before{content:'!';font-size:50px;}" +
        "@keyframes ror { 40%,80%{transform:scale(.94);} 20%,60%{transform:scale(1.09);} }";
    
    //myconfirm close button css    
    css +=
        ".alert-btn{padding:9px 25px;border:1px solid;color:#fff;cursor:pointer;border-radius:4px;outline:none;font-size:14px;min-width:96px;margin:0 12px}" +
        ".dang{background-color:#F66358;border-color:#f44336;} .dang:hover{background-color:#f44336}" +
        ".default{background-color:#fff;color:#111; border-color:#9e9e9e;}.default:hover{border-color:#000;color:#000;}";
    
    //cross button css (x)
    css +=
        ".x-btn{color:#999;cursor:pointer;float:right;margin-right:-10px;margin-top:-14px;font-size:12px;}.x-btn::after{clear:right;}.x-btn:hover{color:#000;}";
    
    //myconfirm remove animation
    css += ".remove{animation:BtoT .5s !important;}" +
        "@keyframes BtoT{ from {} to {margin-top:-400px; opacity:0}}";
    
    // adding shaking animation css
    css += ".shake {animation: shake .6s;}.shake1 {animation: shake1 .6s;}" +
        "@keyframes shake {0%,100% {transform: translateX(0);}10%,50%,90% {transform: translateX(-6px);}30%,70% {transform: translateX(6px);}}" +
        "@keyframes shake1 {0%,100% {transform: translateX(0);}10%,50%,90% {transform: translateX(-6px);}30%,70% {transform: translateX(6px);}}";
    
    //checking message is given or not
    if (!msg) {
        msg = "This is Confirmation Box";
    }
    
    //checking link is given by user or not        
    if (!link) {
        link = "";
    }
    
    // checking document.onclick variable,assigned or not       
    if (document.onclick) {
        var get_doc = document.onclick;
        get_doc = String(get_doc);
        get_doc = get_doc.replace(/\"/g, "\'");
    }
    
    //inserting myconfirm to body
    document.body.innerHTML += '<div class="myconfirm" id="myconfirm">' +
        "<style>" + css + "</style>" + '<div class="myconfirm-content">' +
        '<div class="myconfirm-header">' +
        '<span class="x-btn" onclick="close_myconfirm(), restore_doc(' + get_doc + ')">&#x2716;</span>' +
        '<div class="alert-symbol"></div>' + '<h2>Are you sure?</h2>' +
        '</div>' + '<div class="myconfirm-body">' + '<p>' + msg + '</p>' +
        '</div>' + '<div class="myconfirm-footer">' +
        '<button class="alert-btn dang" onclick ="close_myconfirm(\'' +
        link + '\'), restore_doc(' + get_doc + ')">Yes</button>' +
        '<button class="alert-btn default" onclick ="close_myconfirm(), restore_doc(' +
        get_doc + ')">Cancel</button>' + '</div>' + '</div>' + '</div>';
    
    //calling animation if user clicked out-side from modal
    document.onclick = checkmyconfirm;
}

//restore value of document.onclick if value is alredy defined
function restore_doc(res) {
    if (res) {
        document.onclick = res;
    }
}

//removing alert element from body
function remove_myconfirm(url) {
    document.getElementById("myconfirm").remove();

    if (url) {
        window.location.href = url;
    }
}

//adding alert remove animation
function close_myconfirm(link) {
    var id = document.getElementsByClassName("myconfirm-content")[0];
    id.classList.add("remove");
    if (!link) {
        link = "";
    }
    setTimeout(remove_myconfirm.bind(null, link), 400);
}

// adding alert shakeing animation if user clicked outside from alert
function checkmyconfirm(e) {
    var confirm_id = document.getElementById('myconfirm');
    var myconfirm = document.getElementsByClassName("myconfirm-content")[0];
    if (e.target === confirm_id) {
        if (!myconfirm.classList.contains("shake")) {
            myconfirm.classList.add("shake");
            myconfirm.classList.remove("shake1");
        } else {
            myconfirm.classList.remove("shake");
            myconfirm.classList.add("shake1");
        }
    }
}


/******************* END of Code *********************/
