<?php
class BMI {
    private $height;
    private $weight;

    public function setHeight($height) {
        $this->height = $height;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function calculateBMI() {
        $heightInMeter = $this->height / 100;
        $bmi = $this->weight / ($heightInMeter * $heightInMeter);
        return round($bmi, 2);
    }
}
?>
