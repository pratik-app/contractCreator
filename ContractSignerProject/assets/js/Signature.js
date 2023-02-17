/*
****************************************************************************************************************************
Author: Pratik More
Description: Used for Signature
Version: 0.1
Website: https://pratikmore.com
Linkedin: www.linkedin.com/in/pratikmore2796
For any Queries or need to connect please contact me on below ID or You can Book an appointment from https://pratikmore.om
Email: developer@pratikmore.com
****************************************************************************************************************************

Note: If you are using this form the read the Bootstrap Documentation first about flex, row & columns,
This project is fully created for helping the small Businesses that will never require any subscriptions
and all.
The SVG used in this image is open source Please Check https://undraw.co/ for more detail Created by Katerina Limpitsouni
The FPDF License is open source please read http://www.fpdf.org/en/FAQ.php AUthor Description is Given in FPDF.php 
FOR Quilljs License visit https://github.com/quilljs/quill/blob/develop/LICENSE 
This Page can only be used by business who purchase this product and can be modified as needed.
Mention the Author and Website in your code This will encourage me to create mer project like this
This Application is license under Evanto Market Terms and Conditions.
This Product is Exclusive on Evanto

THIS is CUSTOMIZED Signature so to work properly maintain the canvas size as it is

!Built with Passion!
****************************************************************************************************************************
*/ 
$(document).ready(function () {
    var canvas = document.getElementById('client-sig'); // Getting Element From ID
    var context = canvas.getContext("2d");
    var clickX = new Array();
    var clickY = new Array();
    var clickDrag = new Array();
    var paint;
    canvas.addEventListener("mousedown", mouseDown, false); //Getting mouse Events
    canvas.addEventListener("mousemove", mouseXY, false);
    document.body.addEventListener("mouseup", mouseUp, false);
    canvas.addEventListener("touchstart", touchDown, false);
    canvas.addEventListener("touchmove", touchXY, true);
    canvas.addEventListener("touchend", mouseUp, false);
    document.body.addEventListener("touchcancel", mouseUp, false);
    //This function will draw paint element 
    function draw() {
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.strokeStyle = "#000000";
        context.lineJoin = "miter"; 
        context.lineWidth = 2; 
        for (var i = 0; i < clickX.length; i++) {
            context.beginPath(); 
            if (clickDrag[i] && i) {
                context.moveTo(clickX[i - 1], clickY[i - 1]); 
            } else {
                context.moveTo(clickX[i] - 1, clickY[i]); 
            }
            context.lineTo(clickX[i], clickY[i]); 
            context.stroke();
            context.closePath(); 
        }
    }
    // On click save btn send AJAX request
    $("#submit-signature").click(function saveSig() {
        var sigData = canvas.toDataURL("image/png");
        $("#save-signature").val(sigData);
        var signatureData = $("#save-signature").val();
    $.ajax({
        url: './backend/upload.php',
        async: true,
        method:"POST",
        data: {
            sign: signatureData
        },
        success:function(data){
            console.log(data)
            $(".Sigpath").val(data)
            
        }
    })
    });
    // On Clear pressed clear the canvas
    $('#clear-signature').click(
        function clearSig() {
            clickX = new Array();
            clickY = new Array();
            clickDrag = new Array();
            context.clearRect(0, 0, canvas.width, canvas.height);
            $("#save-signature").html('');
        });
        // Add the click
    function addClick(x, y, dragging) {
        clickX.push(x);
        clickY.push(y);
        clickDrag.push(dragging);
    }
    function mouseXY(e) {
        if (paint) {
            var mouseX = e.pageX - $(this).offset().left;
            var mouseY = e.pageY - $(this).offset().top;
            addClick(mouseX, mouseY, true);
            draw();
        }

    }
    function mouseUp() {
        paint = false;
    }
    function mouseDown(e) {
        var mouseX = e.pageX - $(this).offset().left;
        var mouseY = e.pageY - $(this).offset().top;
        paint = true;
        addClick(mouseX, mouseY);
        draw();
    }
    // This is for Mobile Device
    function touchDown(e) {
        e = e.changedTouches[0];
        var mouseX = e.pageX - $(this).offset().left;
        var mouseY = e.pageY - $(this).offset().top;
        paint = true;
        addClick(mouseX, mouseY);
        draw();
    }
    function touchXY(e) {
        if (paint) {
            e = e.changedTouches[0];
            var mouseX = e.pageX - $(this).offset().left;
            var mouseY = e.pageY - $(this).offset().top;
            addClick(mouseX, mouseY, true);
            draw();
        }
    }
});