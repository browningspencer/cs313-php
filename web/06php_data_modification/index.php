<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

<?php

// default Heroku Poestgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
	// localhost configuration URL with postgres username and a database called cs313db
	$dbUrl = "postgres://ebajcfpjkshtru:b047e947739096fcd735f42e1ec0a3b50c65d25b7bc0110602f37c03889554ac@ec2-50-16-231-2.compute-1.amazonaws.com:5432/d4mn8ab0gmv39i";
}

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

if ($_SERVER)

try {
	// Create the PDO connection
	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch {
	print "<p>error: $ex->getMessage() </p>\n\n";
	die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$book = $_POST["book"];
	$chapter = $_POST["chapter"];
	$verse = $_POST["verse"];
	$content = $_POST["content"];
	$topicIds = $_POST["topicIds"];
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label>Book: </label> <input type="text" name="book" required><br>
		<label>Chapter: </label><input type="text" name="chapter" required><br>
		<label>Verse: </label><input type="text" name="verse"><br>
		<label>Content: </label><textarea rows="4" cols="50" name="content"></textarea><br>
		<label>Topics: </label>
		<?php
			$statement = $db->prepare("SELECT id FROM topic");
			$statement->execute();
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				echo "<input type='checkbox' name='topicIds[]' value='$row[id]' id='topicIds$row[id]'>";
  			echo "<label for='topicIds$row[id]'>$row[name]</label></br>";
			}
			
			$statement = $db->prepare('INSERT INTO scripture(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)');

			$statement->bindValue(':book', $book);
			$statement->bindValue(':chapter', $chapter);
			$statement->bindValue(':verse', $verse);
			$statement->bindValue(':content', $content);

			$statement->execute();

			echo "<input type='submit'></form";

			// get the new id
			$scriptureId = $db->lastInsertId();

			// Now go through each topic id in the list from the user's checkboxes
			foreach ($topicIds as $topicId)
			{

				// Again, first prepare the statement
				$statement = $db->prepare('INSERT INTO topic_scripture_relation(scriptureId, topic_id) VALUES(:scripture_id, :topic_id)');
				// Then, bind the values
				$statement->bindValue(':scripture_id', $scriptureId);
				$statement->bindValue(':topic_id', $topicId);
				$statement->execute();
				echo "scriptureId: $scriptureId<br>topicId: " . var_dump($topicId) . "<br";
			}

			echo "<hr><h1>Scriptures</h1>";

			// prepare the statement
			$statement = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures');
			$statement->execute();

			// Go through each result
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				echo '<p>';
				echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
				echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
				echo '<br />';
				echo 'Topics: ';
				// get the topics now for this scripture
				$stmtTopics = $db->prepare('SELECT name FROM topic t' . ' INNER JOIN topic_scripture_relation st ON st.topic_id = t.id' . ' WHERE st.scripture_id = "scriptureId');
				$stmtTopics->bindValue(':scriptureId', $row['id']);
				$stmtTopics->execute();
				// Go through each topic in the result
				while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
					{
						echo $topicRow['name'] . ', ';
					}
					echo '</p>';
			}
		?>

</body>
</html>