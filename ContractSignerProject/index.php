<?php
require 'Components/header.php';
?>
<!--  Form body Starts Here-->
<section id="bodyStartshere">

    <body>
        <div class="container formpdf">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="https://pratikmore.com/assets/img/logo.png" height = "100px" width="100px"/>
                </div>
                <div class="col-md-12 text-center">
                    <h1 class="heading">You can create a Contract By filling the form below!</h1>
                </div>
                <div class="col-md-12 text-center">
                    <div class="contractform">
                        <h2 class="normalFont">Contract Form</h2>
                            <div class="row" style="padding:20px">
                                <div class="col-md-6" style="border: 1px solid #000; padding:25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <label for="CompanyName" class="lable-text formfonts">Company Name/Business Name</label>
                                    <input type="text" name="CompanyName" id="ComapnyName" class="form-control" require/></br>
                                    <label for="ContractTitle" class="lable-text formfonts">Contract/Agreement Title</label>
                                    <input type="text" name="ContractTitle" id="ContractTitle" class="form-control " require/></br>
                                    <label for="ContractDate" class="lable-text formfonts">Contract Date</label>
                                    <input type="date" name="ContractDate" id="ContractDate" class="form-control" require/></br>
                                    <label for="DetailDescription" class="lable-text formfonts">Create Detail Description</label>
                                    <div id="editor-container" name="editor-container" class="editor-container">

                                    </div></br>
                                    </br>
                                    <label for="CustName" class="lable-text formfonts">Customer/Client Name</label>
                                    <input type="text" name="CustName" id="CustName" class="form-control" require/></br>
                                    <input type="hidden" name="quill-html" id="quill-html">
                                    <label for="CustSign" class="lable-text formfonts">Customer/Client Signature</label></br>
                                        <canvas id="client-sig" width="300px" height="150" style="border: 1px solid #ddd;"></canvas>
                                        <br>
                                        <button id="submit-signature" class="btn btn-primary">Save</button>
                                        <button id="clear-signature" class="btn btn-success">Clear</button></br></br>
                                        <textarea id="save-signature" name="sign" style="display:none"></textarea>
                                        <input type="text" name="Sigpath" class="Sigpath" value="" style="display: none">
                                    <button type="button" name="downloadPDF" class="form-control btn btn-success downloadPDF">Download PDF</button></br></br>
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/img/formimg.svg" class="formimage" />
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="assets/js/main.js"></script>
        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <!-- Initialize Quill editor -->
        <script>
            var Delta = Quill.import('delta');
            var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'header': [1, 2, 3, 4, 5, 6, true] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'align': [] }]
            ];
            var quill = new Quill('#editor-container', {
            modules: {
                toolbar:toolbarOptions,
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
            });

            // Store accumulated changes
            var change = new Delta();
            quill.on('text-change', function(delta) {
            change = change.compose(delta);
            });
        </script>
        
    
    </body>
</section>
<?php

require 'Components/footer.php';
?>