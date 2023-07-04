<?php
// class BMI
// {
//     private $height;
//     private $weight;
//     private $BMI;
//     function __construct($height, $weight, $BMI)
//     {
//         $this->height = $height;
//         $this->weight = $weight;
//         $this->BMI = $BMI;
//     }
//     function get_height(){
//         return $this-> height;
//     }
//     function get_weight(){
//         return $this-> weight;
//     }
//     function get_BMI(){
//         return $this-> BMI;
//     }

//     function calculateBMI()
//     {
//         // แปลงความสูงจากเซนติเมตรเป็นเมตร
//         $heightInMeter = $this->height / 100;

//         // คำนวณค่า BMI
//         $this->BMI = $this->weight / ($heightInMeter * $heightInMeter);

//         // ปัดเศษทศนิยมเป็นทศนิยมที่สองตำแหน่ง
//         $this->BMI = round($this->BMI, 2);
//     }
// }

// // ตัวอย่างการใช้งาน
// $height = 165; // ส่วนสูง (เซนติเมตร)
// $weight = 70; // น้ำหนัก (กิโลกรัม)

// $bmiObj = new BMI($height, $weight,$bmi);
// $bmiValue = $bmiObj->get_BMI();

// echo "ค่า BMI ของคุณคือ: " . $bmiValue;
   


class BMICalculator {
    private $height;
    private $weight;
    private $bmi;

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function calculateBMI() {
        $this->bmi = $this->weight / (($this->height / 100) ** 2);
        return $this->bmi;
    }

    public function isNormalWeight() {
        if ($this->bmi >= 18.5 && $this->bmi <= 24.9) {
            return true;
        } else {
            return false;
        }
    }
}

if (isset($_POST['weight']) && isset($_POST['height'])) {
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    // Create an instance of BMICalculator
    $calculator = new BMICalculator();
    $calculator->setHeight($height);
    $calculator->setWeight($weight);
    $bmi = $calculator->calculateBMI();
    $isNormalWeight = $calculator->isNormalWeight();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
</head>

<body>
    <h1>BMI Calculator</h1>

    <form method="POST" action="">
        <label for="weight">Weight (kg):</label>
        <input type="text" name="weight" id="weight" required>

        <label for="height">Height (cm):</label>
        <input type="text" name="height" id="height" required>

        <button type="submit">Calculate BMI</button>
    </form>

    <?php if (isset($bmi) && isset($isNormalWeight)) : ?>
        <h2>Result:</h2>
        <p>Your weight: <?php echo $weight; ?> kg</p>
        <p>Your height: <?php echo $height; ?> cm</p>
        <p>Your BMI: <?php echo $bmi; ?></p>
        <p><?php echo $isNormalWeight ? 'Your weight is within the normal range.' : 'Your weight is not within the normal range.'; ?></p>
    <?php endif; ?>
</body>

</html>



?>