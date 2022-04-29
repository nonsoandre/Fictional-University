Hey there!

<br>
Welcome to our wordpress theme.
<br>
Made in naija.

<?php
 function myFirstFunction(){
     echo 2 + 2;
     echo "<p>Hello this is my first function in php</p>";
 }

 //to run function
 myFirstFunction(); 
?>

<?php
 function greet($name, $color){
     echo "<p>My name is $name and my favourite color is $color </p>";
 }

 greet("John", "blue");
 greet("jane", "green");

 

?>

<?php 

 $names = array('James', 'Tonia', 'Kehinde');

 $count = 0;
 while($count < count($names)){
     echo "<li> My name is  $names[$count]  </li>";

     $count++;
 }
?>
<p>Hi, my name is <?php echo $names[0];    ?>  </p> 