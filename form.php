<?php
include("databaselink.php");
?>
<center>
<form action="//submit.form" id="EmploymentApplication100" method="post" onsubmit="return ValidateForm(this);">
    <script type="text/javascript">
    function ValidateForm(frm) {
    if (frm.First_Name.value == "") { alert('First name is required.'); frm.First_Name.focus(); return false; }
    if (frm.Last_Name.value == "") { alert('Last name is required.'); frm.Last_Name.focus(); return false; }
    if (frm.Email_Address.value == "") { alert('Email address is required.'); frm.Email_Address.focus(); return false; }
    if (frm.Email_Address.value.indexOf("@") < 1 || frm.Email_Address.value.indexOf(".") < 1) { alert('Please enter a valid email address.'); frm.Email_Address.focus(); return false; }
    if (frm.Position.value == "") { alert('Position is required.'); frm.Position.focus(); return false; }
    if (frm.Phone.value == "") { alert('Phone is required.'); frm.Phone.focus(); return false; }
    return true; }
    </script>
    <p style="background-image: url('2.jpg');width:1000px;background-repeat:no-repeat;width:1000px">

    <table border="0" cellpadding="5" cellspacing="0">
    <tr> 
        <td style="width: 50%">
    <label for="First_Name"><b>First name *</b></label><br />
    <input name="First_Name" type="text" maxlength="50" style="width:100%;max-width: 260px" />
    </td> 
    <td style="width: 50%">
    <label for="Last_Name"><b>Last name *</b></label><br />
    <input name="Last_Name" type="text" maxlength="50" style="width:100%;max-width: 260px" />
    </td> </tr> 
    <tr> <td colspan="2">
    <label for="Email_Address"><b>Email *</b></label><br />
    <input name="Email_Address" type="text" maxlength="100" style="width:100%;max-width: 535px" />
    </td> </tr> 
    <tr> <td colspan="2">
    <label for="Portfolio"><b>Portfolio website</b></label><br />
    <input name="Portfolio" type="text" maxlength="255" value="http://" style="width:100%;max-width: 535px" />
    </td> </tr> 
    <tr> <td colspan="2">
    <label for="Position"><b>Position you are applying for *</b></label><br />
    <input name="Position" type="text" maxlength="100" style="width:100%;max-width: 535px" />
    </td> </tr> 
    <tr> <td>
    <label for="Salary"><b>Salary requirements</b></label><br /> <input name="Salary" type="text" maxlength="50" style="width:100%;max-width: 260px" /> </td> <td>
    <label for="StartDate"><b>When can you start?</b></label><br />
    <input name="StartDate" type="text" maxlength="50" style="width:100%;max-width: 260px" />
    </td> </tr> 
    <tr> <td>
    <label for="Phone"><b>Phone *</b></label><br />
    <input name="Phone" type="text" maxlength="50" style="width:100%;max-width: 260px" />
    </td> <td>
    <label for="Fax"><b>Fax</b></label><br />
    <input name="Fax" type="text" maxlength="50" style="width:100%;max-width: 260px" />
    </td> </tr> 
    <tr> <td colspan="2">
    <label for="Relocate"><b>Are you willing to relocate?</b></label><br />
    <input name="Relocate" type="radio" value="Yes" checked="checked" /> Yes      
    <input name="Relocate" type="radio" value="No" /> No      
    <input name="Relocate" type="radio" value="NotSure" /> Not sure
    </td> </tr> 
    <tr> <td colspan="2">
    <label for="Organization"><b>Last company you worked for</b></label><br />
    <input name="Organization" type="text" maxlength="100" style="width:100%;max-width: 535px" />
    </td> </tr> 
    <tr> <td colspan="2">
        <label for="uploadfile"><b>Upload your CV</b></label><br />
        <input type="file" rows="7" cols="40" style="width:100%;max-width: 535px">
        </td> </tr> 
    <tr> <td colspan="2">
    <label for="Reference"><b>Reference / Comments / Questions</b></label><br />
    <textarea name="Reference" rows="7" cols="40" style="width:100%;max-width: 535px"></textarea>
    </td> </tr> 
    <tr> <td colspan="2" style="text-align: center;">
    
    <script src="https://www.100forms.com/js/FORMKEY:JC2PLWKSTANW/SEND:my@email.com" type="text/javascript"></script>
    <input name="skip_submit" type="submit" value="Send Application" />
    </td> </tr>
    </table>
    </form>
</center>

<?php
if(isset($_REQUEST['submit']))
{

     
     $filename = $_FILES["uploadfile"]['name'];
     $tempname = $_FILES["uploadfile"]['tmp_name'];
     $folder = "images/".$filename;
     move_uploaded_file($tempname, $folder);

     
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Email_Address = $_POST['Email_Address'];
    $Portfolio = $_POST['Portfolio'];
    $Position = $_POST['Position'];
    $Salary= $_POST['Salary'];
    $StartDate = $_POST['StartDate'];
    $Phone = $_POST['Phone'];
    $Fax=$_POST['Fax']
    $Relocate = $_POST['Relocate'];
    $Organization = $_POST['Organization'];
    $Reference= $_POST['Reference'];
    

    $query = "INSERT INTO application (First_Name,Last_Name,Email_Address,Portfolio,Position,Salary,StartDate,Phone,Fax,Relocate ,Organization,Reference, uploadfile) VALUES('$First_Name','$Last_Name' ,'$Email_Address' ,'$Portfolio' ,'$Position' ,'$Salary','$StartDate','$Phone','$Fax',$Relocate' ,'$Organization' ,'$Reference','$filename')";
    
    $data = mysqli_query($conn, $query);

    if($data)
    {
        header("location: form.php");
                        die;  
    }
    else
    {
        echo "Error: " ;
    }
}
?>