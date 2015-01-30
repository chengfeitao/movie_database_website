<html>

<h2>Database</h2>
<body>


Type a query in the following box: 

<form action="query.php" method="GET">

    <textarea rows="8" cols="60" name="query">

    </textarea>
    <input type="submit" value="Submit"></input>

</form>

<h3>Result</h3>

<?php
$sql = $_GET["query"];
$dbhost = 'localhost';
$dbuser = 'cs143';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
#$sql = 'SELECT tutorial_id, tutorial_title, 
#               tutorial_author, submission_date
#        FROM tutorials_tbl';

mysql_select_db('TEST', $conn);
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}


echo '<table border="1" cellspacing="1" cellpadding="2">

    <tbody>';
#        <tr align="center">
#            <td>
#                <b>

#                    first

#                </b>
#            </td>
#            <td>
#                <b>

#                    last

#                </b>
#            </td>
#        </tr>
#        <tr align="center">
#            <td>

#                John

#            </td>
#            <td>

#                Cleese

#            </td>
#        </tr>
	while($row = mysql_fetch_row($retval))
	{
		echo '<tr align="center">';
		for ($x=0; $x<sizeof($row); $x++)
	   {
	   	echo "<td>
				<b>$row[$x]</b>
            </td>";
	   }
		echo"</tr>";
	}

echo"    </tbody>

</table>";


 
#echo "Fetched data successfully\n";
mysql_close($conn);
?>
</body>
</html>
