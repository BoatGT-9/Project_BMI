<?php
class BMIShape {
    public function getShape($bmi) {
        if ($bmi < 18.5) {
            return "ผอม";
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            return "ปกติ";
        } elseif ($bmi >= 25 && $bmi < 30) {
            return "ท้วม";
        } else {
            return "อ้วน";
        }
    }
}
?>
