<?php 
    if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName']) && $_SESSION['loggedUserRole'] != 0) {
        header('Location: '.$path);
        exit;
    }

    $sql = 'SELECT * FROM `messages`';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $people = $statement->fetchAll();
?>

<div class="content">
    <h3 class="article-title"> Admin Panel - Message Board</h3>
    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        <?php foreach($people as $person){ ?>
            <tr>
                <td><?php echo($person['id']) ?></td>
                <td><?php echo($person['username']) ?></td>
                <td><?php echo($person['message']) ?></td>
                <td>
                    <a href="edit.php?id=<?php echo($person['id']) ?>">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?php echo($person['id']) ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>
</div>