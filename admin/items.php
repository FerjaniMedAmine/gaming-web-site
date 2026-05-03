<?php
require_once __DIR__ . '/../backend/DAO/DBConnection.php';

$conn = DBConnection();

$tables = array(
    'accessory' => array('categorie', 'name', 'description', 'price', 'stock', 'imgPath'),
    'component' => array('categorie', 'name', 'description', 'price', 'stock', 'imgPath'),
    'desktop' => array('cpu', 'gpu', 'ram', 'storages', 'motherboard', 'psu', 'cooler', 'tower', 'description', 'stock', 'price', 'imgPath'),
    'laptop' => array('brand', 'model', 'cpu', 'gpu', 'ram', 'storages', 'size', 'keyboard', 'camera', 'ports', 'charger', 'description', 'stock', 'price', 'imgPath'),
    'monitor' => array('brand', 'model', 'refreshRate', 'responseTime', 'panel', 'resolution', 'ports', 'size', 'description', 'stock', 'price', 'imgPath'),
    'game' => array('name', 'price', 'imgPath')
);

$email = trim($_POST['email'] ?? ($_GET['email'] ?? ''));
$password = $_POST['password'] ?? ($_GET['password'] ?? '');

$loggedIn = false;
if ($email !== '' && $password !== '') {
    $result = mysqli_query($conn, "SELECT email, password, role FROM users WHERE email = '$email' LIMIT 1");
    $user = $result ? mysqli_fetch_assoc($result) : null;
    if ($user && $user['role'] === 'admin' && $password === $user['password']) {
        $loggedIn = true;
    }
}

if (!$loggedIn) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Items</title>
    </head>
    <body>
        <h1>Not authenticated</h1>
        <p>Please login again.</p>
        <a href="index.php">Back to login</a>
    </body>
    </html>
    <?php
    exit;
}

$selectedTable = $_GET['table'] ?? ($_POST['table'] ?? 'accessory');
if (!array_key_exists($selectedTable, $tables)) {
    $selectedTable = 'accessory';
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'create' || $action === 'update') {
        $fields = $tables[$selectedTable];
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = trim($_POST[$field] ?? '');
        }

        if ($action === 'create') {
            $columns = '';
            $values = '';
            $first = true;
            foreach ($data as $column => $value) {
                if (!$first) {
                    $columns .= ', ';
                    $values .= ', ';
                }
                $columns .= $column;
                $values .= "'" . $value . "'";
                $first = false;
            }
            $sql = "INSERT INTO $selectedTable ($columns) VALUES ($values)";
            if (mysqli_query($conn, $sql)) {
                $message = 'Item created.';
            } else {
                $error = 'Create failed.';
            }
        } else {
            $id = $_POST['id'] ?? 0;
            $setSql = '';
            $first = true;
            foreach ($data as $column => $value) {
                if (!$first) {
                    $setSql .= ', ';
                }
                $setSql .= $column . " = '" . $value . "'";
                $first = false;
            }
            $sql = "UPDATE $selectedTable SET $setSql WHERE id = $id";
            if (mysqli_query($conn, $sql)) {
                $message = 'Item updated.';
            } else {
                $error = 'Update failed.';
            }
        }
    }

    if ($action === 'delete') {
        $id = $_POST['id'] ?? 0;
        $sql = "DELETE FROM $selectedTable WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            $message = 'Item deleted.';
        } else {
            $error = 'Delete failed.';
        }
    }
}

$editId = $_GET['edit'] ?? 0;
$editItem = null;
if ($editId > 0) {
    $result = mysqli_query($conn, "SELECT * FROM $selectedTable WHERE id = $editId LIMIT 1");
    $editItem = $result ? mysqli_fetch_assoc($result) : null;
}

$listResult = mysqli_query($conn, "SELECT * FROM $selectedTable ORDER BY id DESC");
$items = $listResult ? mysqli_fetch_all($listResult, MYSQLI_ASSOC) : array();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Items</title>
</head>
<body>
    <h1>Admin Items</h1>
    <p>Signed in as <?php echo $email; ?></p>

    <?php if ($message !== ''): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <?php if ($error !== ''): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="get" action="items.php">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <label>Table</label>
        <select name="table" onchange="this.form.submit()">
            <?php foreach (array_keys($tables) as $table): ?>
                <option value="<?php echo $table; ?>" <?php echo $table === $selectedTable ? 'selected' : ''; ?>>
                    <?php echo $table; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <h2><?php echo $editItem ? 'Update Item' : 'Create Item'; ?></h2>
    <form method="post" action="items.php">
        <input type="hidden" name="action" value="<?php echo $editItem ? 'update' : 'create'; ?>">
        <input type="hidden" name="table" value="<?php echo $selectedTable; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <?php if ($editItem): ?>
            <input type="hidden" name="id" value="<?php echo $editItem['id']; ?>">
        <?php endif; ?>
        <?php foreach ($tables[$selectedTable] as $field): ?>
            <div>
                <label><?php echo $field; ?></label>
                <input type="text" name="<?php echo $field; ?>" value="<?php echo $editItem[$field] ?? ''; ?>">
            </div>
        <?php endforeach; ?>
        <button type="submit"><?php echo $editItem ? 'Update' : 'Create'; ?></button>
        <?php if ($editItem): ?>
            <a href="items.php?table=<?php echo $selectedTable; ?>&email=<?php echo $email; ?>&password=<?php echo $password; ?>">Cancel</a>
        <?php endif; ?>
    </form>

    <h2>Items</h2>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>id</th>
                <?php foreach ($tables[$selectedTable] as $field): ?>
                    <th><?php echo $field; ?></th>
                <?php endforeach; ?>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <?php foreach ($tables[$selectedTable] as $field): ?>
                        <td><?php echo $item[$field] ?? ''; ?></td>
                    <?php endforeach; ?>
                    <td>
                        <a href="items.php?table=<?php echo $selectedTable; ?>&edit=<?php echo $item['id']; ?>&email=<?php echo $email; ?>&password=<?php echo $password; ?>">edit</a>
                        <form method="post" action="items.php" style="display:inline-block;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="table" value="<?php echo $selectedTable; ?>">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <input type="hidden" name="password" value="<?php echo $password; ?>">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
