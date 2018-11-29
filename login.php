<!DOCTYPE html>
<html>
<?php
require('login_tools.php');

/**
 * Function to verify user's entered credentials. Modify this to use queries from your DB.
 * User will stay authorized until they logout. That will end the session and they will no longer have access to the
 * page that requires authorization.
 *
 * To test this use the defaults of "username" and "password"
 *
 * @param $username string Username from the login form
 * @param $password string Password from the entered form
 * @return int
 */
function authorize($username, $password)
{
    // Notice the use of sha1 on the passwords, make sure you store your passwords with sha1 (avoid MD5)
    return ($username == 'username' & sha1($password) == sha1('password')) ? 0 : -1;
}

// If the login form has been entered
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check the user's credentials
    $pid = authorize($_POST['username'], $_POST['password']);

    if ($pid == -1) {
        // If the user is not authorized, then show them a message saying they aren't allowed to be there
        echo '<P style=color:red>Login failed please try again.</P>';
    } else {
        // If user _is_ authorized, set a session variable saying they are logged in, set the header, then load the page
        session_start();
        $_SESSION['logged_in'] = 'YES';
        header("location: authorized_page.php");
        load('authorized_page.php', $pid);
    }
}
?>

<h1>Demo login</h1>
<form action="login.php" method="POST">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username"/></td>
            <td>Password:</td>
            <td><input type="password" name="password"/></td>
        </tr>
    </table>
    <p><input type="submit"></p>
</form>
</html>