<html>  
   <head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>Untitled Document</title>  
   </head>  
   <table border="1">  
      <tbody>  
         <tr>  
            <td>Roll No</td>  
            <td>Name</td>  
            <td>Discipline</td>  
            <td>Subject</td>  
            <td>Marks</td>  
         </tr>  
         <?php  
         foreach ($output->result() as $row)  
         {  
            ?><tr>  
            <td><?php echo $row->STUDENT_ROLL_NO ;?></td>  
            <td><?php echo $row->STUDENT_NAME;?></td> 
            <td><?php echo $row->DISCIPLINE;?></td>
            <td><?php echo $row->SUBJECT;?></td>
            <td><?php echo $row->MARKS;?></td> 
            </tr>  
         <?php }  
         ?>  
      </tbody>  
   </table>  
<body>  
</body>  
</html>