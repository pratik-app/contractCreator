 /*
****************************************************************************************************************************
Author: Pratik More
Description: Used for all JS work
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
The FPDF License is open source please read http://www.fpdf.org/en/FAQ.php Author Description is Given in FPDF.php 
FOR Quilljs License visit https://github.com/quilljs/quill/blob/develop/LICENSE 
This Page can only be used by business who purchase this product and can be modified as needed.
Mention the Author and Website in your code This will encourage me to create mer project like this


!Built with Passion!
****************************************************************************************************************************
*/

// Send AJAX request to PDFCreator.php 
$(".downloadPDF").click( function(){
    var html = quill.root.innerHTML;
    var inputgotdata = $('#quill-html').val( html )
    var Contract = inputgotdata.val();
    var ContractDesc = Contract;
    var clientSig = $(".Sigpath").val();
    var CompanyName = $("#ComapnyName").val();
    var ContractTitle = $("#ContractTitle").val();
    var ContractDate = $("#ContractDate").val();
    var CustomerName = $("#CustName").val();
    $.ajax({
        url: './backend/pdfcreator.php',
        async: true,
        method:"POST",
        data:{
            companyName: CompanyName,
            contractTitle: ContractTitle,
            contractDate: ContractDate,
            contractDescription: ContractDesc,
            clientName: CustomerName,
            sigPath: clientSig
        },
        xhrFields:{
            responseType: 'blob'
        },
        success: function(data){
            console.log(data)
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.href = url
            a.download = "Generated Contract.pdf";
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url)
            
        }
    })
})
