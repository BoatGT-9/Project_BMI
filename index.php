<?php
class BMI
{
    private $height;
    private $weight;
    private $BMI;

    function __construct($height, $weight)
    {
        $this->height = $height;
        $this->weight = $weight;
        $this->calculateBMI();
    }

    function get_height()
    {
        return $this->height;
    }

    function get_weight()
    {
        return $this->weight;
    }

    function get_BMI()
    {
        return $this->BMI;
    }

    function calculateBMI()
    {
        // แปลงความสูงจากเซนติเมตรเป็นเมตร
        $heightInMeter = $this->height / 100;

        // คำนวณค่า BMI
        $this->BMI = $this->weight / ($heightInMeter * $heightInMeter);

        // ปัดเศษทศนิยมเป็นทศนิยมที่สองตำแหน่ง
        $this->BMI = number_format($this->BMI, 2);
    }
     public function BMI(){
        if($this->BMI >=18.5 && $this->BMI() <= 24.9){
            return true;
        }else{
            return false;
        }
     }
}

// ตรวจสอบว่ามีการส่งค่าจากฟอร์มหรือไม่
if (isset($_POST['Submit'])) {
    $height = $_POST['height']; // ส่วนสูง (เซนติเมตร)
    $weight = $_POST['weight']; // น้ำหนัก (กิโลกรัม)

    $bmiObj = new BMI($height, $weight);
    $BMIValue = $bmiObj->get_BMI();
    // $isNormalWeight =$calculator->isNormalWeight();

    // echo "ค่า BMI ของคุณคือ: " . $BMIValue;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI</title>
    <link href="style.css" rel="stylesheet">

</head>
<body>
    <form action="BMI" method="POST">

        <div class="head">
            <h2>คำนวณดัชนีมวลกาย BMI</h2>
        </div>
        <div class="form-group">
            <input type="text" placeholder="น้ำหนัก(KG.)" name="weight">
            <br>
            <input type="text" placeholder="ส่วนสูง(CM.)" name="height">
        </div>
        <input class="Submit" type="Submit" name="Submit" value="กดเล้ยย!!!" style="color:white">
<div class="card">
    <?php
    if (isset($BMIValue)) {
        echo "<p>น้ำหนัก: {$weight} KG</p>";
        echo "<p>ส่วนสูง: {$height} CM</p>";
        echo "<p>BMI: {$BMIValue}</p>";
        // echo "<p>Your BMI: {$isNormalWeight} น้ำหนักของคุณอยู่ในเกณฑ์ปกติ : น้ำหนักของคุณไม่อยู่ในเกณฑ์ปกติ";
    }
    ?>
</div>
    </form>
</body>

</html>