<?php
include 'BMI.php';
include 'BMIShape.php';

// ตรวจสอบการส่งค่าผ่านฟอร์ม
if (isset($_POST['Submit'])) {
    $height = $_POST['height']; // ส่วนสูง (เซนติเมตร)
    $weight = $_POST['weight']; // น้ำหนัก (กิโลกรัม)

    $bmiCalculator = new BMI();
    $bmiCalculator->setHeight($height);
    $bmiCalculator->setWeight($weight);
    $bmiValue = $bmiCalculator->calculateBMI();

    $shapeClassifier = new BMIShape();
    $shape = $shapeClassifier->getShape($bmiValue);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    
        <form action="index.php" method="POST">
            <h2>คำนวณดัชนีมวลกาย BMI</h2>
            <input type="text" placeholder="ส่วนสูง (เซนติเมตร)" name="height" required>
            <input type="text" placeholder="น้ำหนัก (กิโลกรัม)" name="weight" required>
            <input type="submit" name="Submit" value="คำนวณ">
            <?php
            if (isset($bmiValue) && isset($shape)) {
                echo "<h3>ผลลัพธ์:</h3>";
                echo "<p>ค่า BMI ของคุณคือ: " . $bmiValue . "</p>";
                echo "<p>รูปร่างของคุณคือ: " . $shape . "</p>";
            }
            ?>
        </form>    


    
</body>

</html>