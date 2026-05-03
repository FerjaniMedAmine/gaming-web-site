<?php
require_once __DIR__ . '/../backend/DAO/DBConnection.php';

$conn = DBConnection();
$error = '';
$ok = false;
$email = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = trim($_POST['email'] ?? '');
	$password = $_POST['password'] ?? '';
	if ($email === '' || $password === '') {
		$error = 'Email and password are required.';
	} else {
		$result = mysqli_query($conn, "SELECT email, password, role FROM users WHERE email = '$email' ");
		$user = $result ? mysqli_fetch_assoc($result) : null;
		if ($user && $user['role'] === 'admin' && $password === $user['password']) {
			$ok = true;
		} else {
			$error = 'Invalid credentials.';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
</head>
<body>
	<h1>Admin Login</h1>

	<?php if ($ok): ?>
		<p>Login successful.</p>
		<form method="post" action="items.php">
			<input type="hidden" name="email" value="<?php echo $email; ?>">
			<input type="hidden" name="password" value="<?php echo $password; ?>">
			<button type="submit">Continue to admin</button>
		</form>
	<?php else: ?>
		<?php if ($error !== ''): ?>
			<p><?php echo $error; ?></p>
		<?php endif; ?>
		<form method="post" action="index.php">
			<div>
				<label>Email</label>
				<input type="email" name="email" required>
			</div>
			<div>
				<label>Password</label>
				<input type="password" name="password" required>
			</div>
			<button type="submit">Login</button>
		</form>
	<?php endif; ?>
</body>
</html>
