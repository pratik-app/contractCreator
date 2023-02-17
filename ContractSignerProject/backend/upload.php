<?php 
/*
****************************************************************************************************************************
Author: Pratik More
Description: Used for Saving signature
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
$folderPath = "SaveSignature/"; // Saving in the SaveSignature Folder
$image_parts = explode(";base64,", $_POST['sign']); //Splting the string & taking 2 index
$image_type_aux = explode("image/", $image_parts[0]); 
$image_type = $image_type_aux[1]; // Image extension (.png)
$image_base64 = base64_decode($image_parts[1]);//Decoding the base64 
$file = $folderPath. uniqid() . "." . $image_type; //Creating unique file Please read uniqid() php Documentation 
file_put_contents($file, $image_base64); //Storing file content in folder
echo $file; //Echo is !Importatnt because we are sending AJAX Request from Frontend 
?>