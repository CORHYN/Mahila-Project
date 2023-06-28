<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        table th, table td {
            border: 1px solid black;
            padding: 8px;
        }
        
        table th {
            background-color: #9d58a8;
        }
        
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1 align="center" >User Profile</h1>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Education</th>
            <th>Years of Experience</th>
            <th>Work History</th>
            <th>Social Media Accounts</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "ma zejun", "mazejun2001", "mahila");
        if (!$conn) {
            die("database connect error: " . mysqli_connect_error());
        }
        $query = "SELECT * FROM user_table";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['userid'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['addr'] . "</td>";
                echo "<td>" . $row['education'] . "</td>";
                echo "<td>" . $row['yearsofexperience'] . "</td>";
                echo "<td>" . $row['workhistory'] . "</td>";
                echo "<td>" . $row['socialmediaaccounts'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No user information found.</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
