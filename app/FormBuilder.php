<?php declare(strict_types=1);

class FormBuilder{

    /*
    jest to funkcja w uzywana w innych funkcjach
    aby nie pisac tego samego 1000 razy    
    */
    private function addAttributeToElement($element, $attributeName, $attributeValue){
        return $element . " " . $attributeName . '="' . $attributeValue . '"';
    }

    public function generateLabel(string $labelText, string $labelId = null, string $labelName = null){

        $finalLabel = "<label";
        
        if($labelId != null){
            $finalLabel = $this->addAttributeToElement($finalLabel, 'id', $labelId);
        }
        if($labelName != null){
            $finalLabel = $this->addAttributeToElement($finalLabel, 'name', $labelName);
        }

        $finalLabel = $finalLabel . ">" . $labelText . "</label>";

        return $finalLabel;

    }
    public function generateButton(string $buttonText, string $buttonId = null, string $buttonName = null){
        $finalButton = "<button";

        if($buttonId != null){
            $finalButton = $this->addAttributeToElement($finalButton, 'id', $buttonId);
        }
        if($buttonName != null){
            $finalButton = $this->addAttributeToElement($finalButton, 'name', $buttonName);
        }

        $finalButton = $finalButton . ">" . $buttonText . "</button>";

        return $finalButton;

    }

    public function generateInput(string $inputType, string $inputValue = null, string $inputId = null, string $inputName = null){

        $finalInput = '<input type="' . $inputType . '"';

        if($inputValue != null){
            $finalInput = $this->addAttributeToElement($finalInput, 'value', $inputValue);
        }
        if($inputId != null){
            $finalInput = $this->addAttributeToElement($finalInput, 'id', $inputId);
        }
        if($inputName != null){
            $finalInput = $this->addAttributeToElement($finalInput, 'name', $inputName);
        }

        $finalInput = $finalInput . ">";
        return $finalInput;

    }
    //generateForm buduje formularz za pomoca specyfikacji podanych w arrayu, oto przykład:
    /* 
    struktura dla komórek w form_data = [nazwa bloku, atrybuty...]
    $form_data = [
    ["label","Przykladowy formularz"],
    ["br"],
    ["input", "text", "text", "text_input"],
    ["br"],
    ["button", "Wyczysc"],
    ["input", "submit", "Submit"]
    ]
    */
    public function generateForm(string $formAction = null, string $formMethod = null, $form_data = null){
        $finalForm = '<form';
        if($formAction != null){
            $finalForm = $this->addAttributeToElement($finalForm, "action", $formAction);
        }
        if($formMethod != null){
            $finalForm = $this->addAttributeToElement($finalForm, "method", $formMethod);
        }

        $finalForm = $finalForm . ">";

        if($form_data != null){
            foreach($form_data as $element){
                $typeOfElement = $element[0];
                $sizeOfElement = sizeof($element);
                if($typeOfElement == "label"){
                    if($sizeOfElement == 2){
                        $finalForm = $finalForm . $this->generateLabel($element[1]);
                    }
                    if($sizeOfElement == 3){
                        $finalForm = $finalForm . $this->generateLabel($element[1], $element[2]);
                    }
                    if($sizeOfElement == 4){
                        $finalForm = $finalForm . $this->generateLabel($element[1], $element[2], $element[3]);
                    }
                }
                if($typeOfElement == "button"){
                    if($sizeOfElement == 2){
                        $finalForm = $finalForm . $this->generateButton($element[1]);
                    }
                    if($sizeOfElement == 3){
                        $finalForm = $finalForm . $this->generateButton($element[1], $element[2]);
                    }
                    if($sizeOfElement == 4){
                        $finalForm = $finalForm . $this->generateButton($element[1], $element[2], $element[3]);
                    }
                }
                if($typeOfElement == "input"){
                    if($sizeOfElement == 2){
                        $finalForm = $finalForm . $this->generateInput($element[1]);
                    }
                    if($sizeOfElement == 3){
                        $finalForm = $finalForm . $this->generateInput($element[1], $element[2]);
                    }
                    if($sizeOfElement == 4){
                        $finalForm = $finalForm . $this->generateInput($element[1], $element[2], $element[3]);
                    }
                    if($sizeOfElement == 5){
                        $finalForm = $finalForm . $this->generateInput($element[1], $element[2], $element[3], $element[4]);
                    }
                }
                if($typeOfElement == "br"){
                    $finalForm = $finalForm . "<br>";
                }
            }
        }

        $finalForm = $finalForm . "</form>";
        return $finalForm;
    }
}

?>