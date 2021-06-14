

<html>
<body>
<title>next</title>
<?php
    require_once 'login.php';
    

 	function check($chk){
 		if(!$chk) die('<p>ERROR : </p>' . mysqli_connect_error());
 	}

    $conn = mysqli_connect($db_hostname, $db_user, $db_password,$db_database);
 
    if (!$conn) {
        die('<p>Connection failed: </p>' . mysqli_connect_error());
    }
    $command = "use publications";
    $result = mysqli_query($conn,$command);
	check($result);
    if(isset($_POST["ALL"])==TRUE){
    	$temp =0 ;
        $query="select * from authors";
    	$result=mysqli_query($conn,$query); 
 		$numrows=mysqli_num_rows($result);
 		if($numrows!=0){echo "Authors Table : <br><br>"; 
 		for($j=0;$j<$numrows;++$j){
       		$rows=mysqli_fetch_row($result); 
       		$temp=1;
        	echo "name:". $rows[0]."  ||  ";
        	echo "publisher name:". $rows[1]."<br>";
        }}
         $query="select * from titles";
        $result=mysqli_query($conn,$query); 
        $numrows=mysqli_num_rows($result);
        if($numrows!=0){ echo "<br><br><br>Title Table :<br> <br>\n";
        for($j=0;$j<$numrows;++$j){
            $rows=mysqli_fetch_row($result);
            $temp=1; 
            echo "title : ". $rows[0]."  ||  ";
            echo "Author : ". $rows[1]."   ||  ";
            echo "Year : ".$rows[2]."<br>";
        }}
        if($temp==0) echo "<p>Empty table</p>";
         die ("<script>setTimeout(\"location.href = './main.php';\",15000);</script>");
    } 



    if(isset($_POST["ADD_AUTHOR"])==TRUE){
        $a = $_POST["a"];
        $b = $_POST["b"];
        $query = "insert into authors(author,publisher) values ('$a','$b')";
    	$result=mysqli_query($conn,$query);
        if($result) echo "Successfully added author!";
        else echo "ERROR";
    }

    if(isset($_POST["ADD_TITLE"])==TRUE){
        $c = $_POST["c"];
        $d = $_POST["d"];
        $e = $_POST["e"];
        $query = "insert into titles(title,author,year) values ('$c','$d','$e')";
        $result=mysqli_query($conn,$query);
        if($result) echo "Successfully added title!";
        else echo "ERROR";
    }


    if(isset($_POST["DELETE_AUTHOR"])==TRUE){
        $f = $_POST["f"];
        $query = "delete from authors where author = '$f'";
        $result=mysqli_query($conn,$query);
        if($result) echo "Successfully deleted!";
        else echo "ERROR";
    }

    if(isset($_POST["DELETE_TITLE"])==TRUE){
        $g = $_POST["g"];
        $query = "delete from titles where title = '$g'";
        $result=mysqli_query($conn,$query);
        if($result) echo "<p>Successfully deleted!</p>";
        else echo "ERROR";
    }

    if(isset($_POST["UPDATE"])==TRUE){
        $h = $_POST["h"];
        $i = $_POST["i"];
        $query="select * from titles";
        $result=mysqli_query($conn,$query);
        $numrows=mysqli_num_rows($result);
        for($x=0;$x<$numrows;++$x){
            $rows=mysqli_fetch_row($result);
            $tmp = $rows[0];
            if(strpos(strtolower($tmp),strtolower($h))||$rows[0]==$j){
            	$temp = 1;
            	$query = "<p>update titles set year = '$i' where title = '$tmp'</p>";
            	$result=mysqli_query($conn,$query);
            }
        }
        $query = "<p>update titles set year = '$i' where title = '$h'</p>";
        $result=mysqli_query($conn,$query);
        if($result) echo "<p>Successful!</p>";
        else echo "ERROR";
    }

    if(isset($_POST["FIND_BOOK"])==TRUE){
        $j = $_POST["j"];
        $temp = 0; 
        $query="select * from titles";
        $result=mysqli_query($conn,$query);
        $numrows=mysqli_num_rows($result);
        for($x=0;$x<$numrows;++$x){
            $rows=mysqli_fetch_row($result);
            $tmp = $rows[0];
            if(strpos(strtolower($tmp),strtolower($j))||$rows[0]==$j){
            	$temp = 1;
            	echo "title : ". $rows[0]."  ||  ";
            	echo "Author : ". $rows[1]."  ||  ";
            	echo "Year : ".$rows[2]."<br>";
            }
        }
        if($temp==0){
        	echo "<p>No title exists as $j!</p>";
        	die ("<script>setTimeout(\"location.href = './main.php';\",1000);</script>");
        }
        die ("<script>setTimeout(\"location.href = './main.php';\",5000);</script>");
    }
    if(isset($_POST["FIND_PUB"])==TRUE){
        $k = $_POST["k"];
        // $query="select authors.author,titles.title,titles.year where authors.publisher='$k' from authors inner join titles on authors.author=titles.author";
        $query = " SELECT title,year,author from titles where author in ( SELECT author from authors where publisher = '$k')";
        $result=mysqli_query($conn,$query);
        if(!$result) echo "<p>Could not find the publications</p>";
        else{
        echo "<p>given are the details of publications of the publisher : $k</p><br><br>";
        }
        $numrows=mysqli_num_rows($result);
        for($j=0;$j<$numrows;++$j){
            $rows=mysqli_fetch_row($result); 
            echo "author : ". $rows[2]."  ||  ";
            echo "title : ". $rows[0]."  ||  ";
            echo "Year : ".$rows[1]."<br>";
        }
        die ("<script>setTimeout(\"location.href = './main.php';\",5000);</script>");
    }
    die ("<script>setTimeout(\"location.href = './main.php';\",1000);</script>");

?>
</body>
</html>

