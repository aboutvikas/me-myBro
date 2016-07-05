<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="UTF-8">
    <title>Modal CSS & Javascript</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
</head> 
<body>
    <div class="admin-content">
        <button class="b" onclick="show_modal('modal');">Modal Default</button>
        <button class="b" onclick="show_modal('modal2');">Closeable Modal Flip</button>
        <button class="b" onclick="show_modal('modal3');">Closeble Modal Top</button>
        <button class="b" onclick="show_modal('modal4');">Modal Left</button>
    </div>

    <div class="modal alert" id="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="close_modal('modal')"></span>
            <div class="modal-header">
                This Is Header
            </div>
            <div class="modal-body">
                I am Body
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg" onclick="close_modal('modal')">Cancle</button>
            </div>
        </div>
    </div>

    <div class="closeable modal flip" id="modal2">
        <div class="modal-content">
            <span class="close-btn" onclick="close_modal('modal2')"></span>
            <div class="modal-header">
                This Is Header
            </div>
            <div class="modal-body">
                I am Body
            </div>
            <div class="modal-footer">
                This section is Footer
            </div>
        </div>
    </div>

    <div class="closeable modal top" id="modal3">
        <div class="modal-content">
            <span class="close-btn" onclick="close_modal('modal3')"></span>
            <div class="modal-header">
                This Is Header
            </div>
            <div class="modal-body">
                Vikas
            </div>
            <div class="modal-footer">
                This section is Footer
            </div>
        </div>
    </div>
    <div class="modal left" id="modal4">
        <div class="modal-content">
            <div class="modal-header">
                Iam header
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg btn-danger" onclick="close_modal('modal4')">Close</button>
            </div>
        </div>
    </div>
</body>
</html>
<style>
    .admin-content {
        width: 300px;
        margin: 11% auto;
        text-align: center;
    }
    .admin-content button {
        display: inline-block;
        margin-bottom: 15px;
        padding: 10px;
        width: 200px;
        font-size: 14px;
    }
    .modal {
        width: 100%;
        height: 100%;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 100;
        background-color: rgba(0, 0, 0, 0.4);
        box-sizing: border-box;
        opacity: 0;
        transition: all .6s;
        visibility: hidden;
    }
    
    .modal-content {
        background-color: #fff;
        min-width: 310px;
        max-width: 500px;
        width: 33%;
        margin: auto;
        margin-top: 13%;
        box-sizing: border-box;
        border: 1px solid #555;
        overflow: hidden;
        border-radius: 4px;
        box-shadow: 0 0 3px #555;
        text-align: center;
        z-index: 101;
    }
    
    .modal-header,
    .modal-body,
    .modal-footer {
        padding: 15px;
        box-sizing: border-box;
        color: #111;
        min-height: 30px;
    }
    .modal-body{
        border-top: 1px solid #dfdfdf;
        border-bottom: 1px solid #dfdfdf;
    }
    
    .show-modal{
        visibility: visible;
    }
    
/*  modal animations start  */
    
/*  modal deafult animation  */
    .show-modal.modal{
        opacity: 1;
    }
    
/* modal fade animation   */
    
    .fade.modal{
	    opacity: 0;
        transition: all .5s;
    }
    .show-modal.fade.modal{
        opacity: 1;
    }
    .fade.modal .modal-content {
        opacity: 0;
        margin-top: -60px;
        transition:all .5s;
    }
    
    .show-modal.fade.modal .modal-content{
        opacity: 1;
        margin-top: 17px;
    }
    
/* modal flip animation   */
    
    .flip.modal{
        opacity: 0;
        transition: all .4s;
    }
    .show-modal.flip.modal{
        opacity: 1;
    }
    .flip.modal .modal-content{
        transform: rotateX(180deg) scale(.5);
        transition: transform .5s;
    }
    .show-modal.flip.modal .modal-content{
        transform: rotateX(0deg);
    }
    
/* modal left animations   */
    .left.modal{
        opacity: 0;
        margin-left: -350px;
        transition: all .6s;
    }
    .show-modal.left.modal{
        opacity: 1;
        margin-left: 0;
    }
    
    
/* modal top animation   */
    .top.modal{
        margin-top: -400px;
        opacity: 0;
        transition: .4s;
    }
    .show-modal.top.modal {
        margin-top: 0;
        opacity: 1;
    }
    
/* modal shaking animation   */
    .shake{
        animation: shake .6s;
    }
    .shake1{
        animation: shake1 .6s;
    }
    @keyframes shake { 
            0%, 100% {transform: translateX(0);} 
            10%, 50%, 90%{transform: translateX(-6px);} 
            30%, 70%{transform: translateX(6px);} 
         }
    @keyframes shake1 { 
            0%, 100% {transform: translateX(0);} 
            10%, 50%, 90%{transform: translateX(-6px);} 
            30%, 70%{transform: translateX(6px);} 
         }
    
/*  modal animations closed  */
    
</style>
<script>
/* Script For modal */
    
    if (document.getElementsByClassName('modal')) {
        document.onclick = function (e) {
            var modal = document.getElementsByClassName('modal');
            var closeable = document.getElementsByClassName('closeable');
            var modal_content = document.getElementsByClassName('modal-content');
            var i;

            for ( i=0; i<modal.length; i++) {

                if (e.target == closeable[i]) {
                    if (i <= closeable.length) {
                        closeable[i].classList.remove('show-modal');
                    }
                } else if (!modal[i].classList.contains('closeable')) {
                    if (e.target == modal[i]) {

                        if (!modal_content[i].classList.contains('shake')) {
                            modal_content[i].classList.add('shake');
                            modal_content[i].classList.remove('shake1');
                        } else {
                            modal_content[i].classList.remove("shake");
                            modal_content[i].classList.add("shake1");
                        }
                    } 
                }
            }
        }
    }
    
    function close_modal(id) {
        id = document.getElementById(id);
        id.classList.remove("show-modal");
    }
    
    function show_modal(id) {
        id = document.getElementById(id);
        id.classList.toggle("show-modal");
    }
/* /closing Script For modal */

</script>
