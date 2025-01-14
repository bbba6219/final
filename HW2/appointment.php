<?php
session_start(); 
include "ap_db_connect.php";
// 处理表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取用户输入的数据
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $identification_number = $_POST["identification_number"];
    $phone_number = $_POST["phone_number"];
    $appointment_date = $_POST["appointment_date"];
    $appointment_time = $_POST["appointment_time"];
    $doctor_name = $_POST["doctor_name"];

    // 插入数据到数据库
    $query = "INSERT INTO appointments (first_name, last_name, date_of_birth, identification_number, phone_number, appointment_date, appointment_time, doctor_name) 
              VALUES ('$first_name', '$last_name', '$date_of_birth', '$identification_number', '$phone_number', '$appointment_date','$appointment_time', '$doctor_name')";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Appointment created successfully.");</script>';
        // 等待一秒后重定向到其他页面
        echo '<script>
                window.location.href = "http://localhost/final/HW2/search.php";
        </script>';
    } else {
        echo "Error creating appointment: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointment</title>
</head>
<body>
    <h1>Appointment</h1>

    <!-- 预约表单 -->
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" required><br>

        <label for="identification_number">Identification Number:</label>
        <input type="text" name="identification_number" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" required><br>

        <label for="appointment_time">Appointment Time:</label>
            <select name="appointment_time" required>
            <option value="">Select Time</option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
            <option value="Evening">Evening</option>
            </select><br>

        <label for="doctor_name">Doctor:</label>
        <select name="doctor_name" required>
            <option value="">Select Doctor</option>
            <option value="Tim">Tim</option>
            <option value="Ellen">Ellen</option>
            <option value="John">John</option>
        </select><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>