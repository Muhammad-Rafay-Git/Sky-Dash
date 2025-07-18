<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>country</th>
            <th>email</th>
            <th>message</th>
        </tr>

        <?php
        include 'connection.php';
        $select = "SELECT * FROM management";
        $selected = mysqli_query($conn, $select);
        while ($r = mysqli_fetch_array($selected)) {
        ?>
            <tr>
                <td><?php echo $r['id']; ?></td>
                <td><?php echo $r['username']; ?></td>
                <td><?php echo $r['email']; ?></td>
                <td><?php echo $r['country']; ?></td>
                <td><?php echo $r['password']; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
                <td>
                    <a href="update.php?id=<?php echo $r['id']; ?>">Update</a>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>

    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>