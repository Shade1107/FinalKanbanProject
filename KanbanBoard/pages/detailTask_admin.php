<?php 
$path = realpath(__DIR__ ."/../"); 
$isDetailTaskAdmin = true;
require_once("$path/header_footer/header.php");

?>
<head>
 <link rel="icon" type="image/png" href="../image/logo.PNG">
 <link rel="stylesheet" href="../css/style.css">
     <!-- title logo  -->
     <link rel="icon" type="image/png" href="../image/logo2_2.PNG">   
</head>
<body class="MiYcolumn-container">
    

    <section class="column-container mt-5">
      <div class="Ytask-detail pb-2 mb-5">
        <h3 class="text-center py-4">Project Name </h3>
        
        <table class="Ytask-detail-table ">
            <tr>
              <td>Task Name</td>
              <td>Task1</td>
            </tr>

            <tr>
              <td>Task Member</td>
              <td>Aung Aung </td>
            </tr>

            <tr>
              <td>Detail Description</td>
              <td>Task1</td>
            </tr>

            <tr>
              <td>Priority</td>
              <td>Task1</td>
            </tr>

            <tr>
              <td>Create Date</td>
              <td>Task1</td>
            </tr>

            <tr>
              <td>Target Date</td>
              <td>Task1</td>
            </tr>

           

        </table> 
  <br>
  <a href="#" class="buttonlink"><button type="button" class="button mt-1 Ypfchangebtn mb-5">Back</button></a>

        
      </div>
   </section>
  
    <!-- <script src="js/app.js"></script> -->

    <?php 
require_once("$path/header_footer/footer.php");

?>
  </body>

</html>
