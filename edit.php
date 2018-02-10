<!--<!DOCTYPE html>
<html>


 
  <h1 style="margin-left:670px;margin-top:50px;font-family:times new roman;font-style:bold;">EDIT</h1>
  
  <a id= "dpt" class="btn btn-info" style="margin-left:500px;margin-top:50px;padding:5px 37px 5px 37px;background-color:#120303" role="button">Department</a>
  <a id= "crs" class="btn btn-info" style="margin-left:150px;margin-top:50px;padding:5px 47px 5px 47px;background-color:#120303" role="button">Course</a>
<a id= "sub" class="btn btn-info" style="margin-left:500px;margin-top:50px;padding:5px 51px 5px 51px;background-color:#120303" role="button">Subject</a>
  <a id= "bth" class="btn btn-info" style="margin-left:150px;margin-top:50px;padding:5px 52px 5px 52px;background-color:#120303" role="button">Batch</a>

  <script type="text/javascript">
  

$("#dpt").click(function(){
  
  $("#main_containt").load("http://localhost/MPSN/editdepartment.html");
  });

  $("#crs").click(function(){
  
  $("#main_containt").load("http://localhost/MPSN/editcourse.html");

  });

     $("#sub").click(function(){
  
  $("#main_containt").load("http://localhost/MPSN/user.html");
  });
</script>
</body></html>
-->

<!DOCTYPE html>
<html>
<script type="text/javascript" src="jquery.js">
	
</script>
<head>
	
</head>
<body>


<h1 style="margin-left:350px;	margin-top:50px;font-family:times new roman;font-style:bold;"> Edit</h1>
 <label><input  type="radio" id="id_radio1" style="margin-left:320px; margin-top:20px;font-family:times new roman;font-style:bold;" name="colorRadio" > department</label>
        <label><input type="radio" id="id_radio2"  name="colorRadio" > course</label>
          <!--<div align="center" style="padding:25px;width: 300px;">-->
                   <div id="div1" style="margin-left:50px; margin-top:10px; width:800px; display:none;" >
                        
                          
                              <label  style="margin-left:200px;margin-right:30px;margin-top:10px;padding:0PX 1px 0px 1px;">Select department:</label>
                        
                      
  </td>
  <td>

    <?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mpsn";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `department`";
$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);
$options = "";
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

?>
<html>
    
    <body>

        <select>
            <?php echo $options;?>
        </select>

    </body>

</html>
</td>

                         <label  style="margin-left:240px;margin-right:35px;margin-top:10px;">Enter new department name:</label>
                        <input  type="text" id="semester" required placeholder=" Enter semester">
                         <br>
                         <button id="Add_mand" style=" background-color: black;border: none;color: white;padding: 5px 10px 5px 10px;text-decoration: none;margin: 30px 0px 0px 250px;cursor: pointer;" >Submit</button>



                 </div>
                  <div id="div2" style="margin-left:190px; margin-top:10px; width:800px; display:none" >
                       
                        <label>Select Course :</label>
                        
                       
                           <td>

    <?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mpsn";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `course`";
$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);
$options = "";
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

?>
<html>
    
    <body>

        <select>
            <?php echo $options;?>
        </select>

    </body>

</html>
</td>
<br>
                           
                         <label  >Enter new course name:</label>
                        <input style="margin-left:0px;margin-right:0px;margin-top:30px;" type="text" id="Esemester" required placeholder=" Enter semester">
                         <br>
                       
                          <button  id="Add_elec" style=" background-color: black;border: none;color: white;padding: 3px 10px 3px 10px;text-decoration: none;margin: 30px 2px 0px 0px;cursor: pointer;" >Submit</button>



              </div>


        <script type="text/javascript">
          //for hide and show
           var subject_type='';
                  $('#id_radio1').click(function () {
                       $('#div2').hide('fast');
                       $('#div1').show('fast');
                       subject_type =$('#id_radio1').val();
                       //alert(subject_type);


                });
                $('#id_radio2').click(function () {
                      $('#div1').hide('fast');
                      $('#div2').show('fast');
                      subject_type =$('#id_radio2').val();
                 });

               //for mandatory  post
               $('#Add_mand').click(function(){
                  
                         // var subject_code=$('#subject_code').val();
                          var subject_name=$('#subject_name').val();
                          var credit =$('#credit').val();
                          if (credit>10 || credit<1){
                            alert("Enter between 1 to 10 !");
                            return;
                          };
                        

                       
                          var semester=$('#semester').val();
                           if(subject_name.length==0)
                        {
                           $("#subject_name").css('border-color','red');
                           alert("please insert subject_name");          
                           return;
                        }
                             
                           if(credit.length==0)
                         {
                           $("#credit").css('background-color','red');
                            alert("please insert credit");          
                               return;
                           }



                           if(semester.length==0)
                         {
                           $("#semester").css('background-color','red');
                            alert("please insert semester");          
                               return;
                           }
                            

                   

                          $.post("addSubject.php",{subject_type:"manadatory",subject_name:subject_name,credit:credit,semester:semester},function(data){
                         alert(data);
                      });





                       });
                      
               

               //for Elective  post
               $('#Add_elec').click(function()
               {
                 
                     //var Esubject_code=$('#Esubject_code').val();
                         var  Esubject_name=$('#Esubject_name').val();
                         alert(Esubject_name);
                           var Esubject_credit =$('#Esubject_credit').val();
                           alert(Esubject_credit);
                           var Esemester=$('#Esemester').val();
                           alert(Esemester);

                           $.post("addSubject.php",{subject_type:"elective",subject_name:Esubject_name,credit:Esubject_credit,semester:Esemester},function(data){
                         alert(data);

                       
                });



               });
            

          




       </script>




</body>
</html>