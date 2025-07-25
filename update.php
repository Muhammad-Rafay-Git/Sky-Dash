<?php
include 'connection.php';

$id = $_GET['id'];

// Fetch existing data
$getData = mysqli_query($conn, "SELECT * FROM management WHERE id = $id");
$row = mysqli_fetch_assoc($getData);

if (!$row) {
    echo "No record found for ID: $id";
    exit;
}

// Update when form is submitted
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $password = $_POST['password'];

    $update = "UPDATE management SET 
                username = '$username',
                email = '$email',
                country = '$country',
                password = '$password'
                WHERE id = $id";

    mysqli_query($conn, $update);
    header("Location: index.php");
}
?>


<form method="post">
    <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
    <select name="country" required>
        <option value="<?php echo $row['country']; ?>"><?php echo $row['country']; ?></option>
        <option value="United States of America">United States of America</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="India">India</option>
        <option value="Canada">Canada</option>
        <option value="Australia">Australia</option>
        <option value="France">France</option>
        <option value="Japan">Japan</option>
        <option value="China">China</option>
        <option value="Brazil">Brazil</option>
        <option value="South Africa">South Africa</option>
        <option value="Italy">Italy</option>
        <option value="Spain">Spain</option>
        <option value="Mexico">Mexico</option>
        <option value="Netherlands">Netherlands</option>
        <option value="Sweden">Sweden</option>
        <option value="Norway">Norway</option>
        <option value="Finland">Finland</option>
        <option value="Switzerland">Switzerland</option>
        <option value="Belgium">Belgium</option>
        <option value="Poland">Poland</option>
        <option value="Turkey">Turkey</option>
        <option value="South Korea">South Korea</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Philippines">Philippines</option>
        <option value="Thailand">Thailand</option>
        <option value="Vietnam">Vietnam</option>
        <option value="Singapore">Singapore</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Portugal">Portugal</option>
        <option value="Greece">Greece</option>
        <option value="Ireland">Ireland</option>
        <option value="Denmark">Denmark</option>
        <option value="Austria">Austria</option>
        <option value="Czech Republic">Czech Republic</option>
    </select><br>
    <input type="password" name="password" value="<?php echo $row['password']; ?>" required><br>
    <input type="submit" name="update" value="Update">
</form>