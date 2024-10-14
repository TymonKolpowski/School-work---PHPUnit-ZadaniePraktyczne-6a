<?php

use PHPUnit\Framework\TestCase;
require('app/FormBuilder.php');

class FormBuilderTest extends TestCase {
    public function setUp() : void {
		$this->instance = new FormBuilder();
	}
	public function tearDown() : void {
		unset($this->instance);
	}
    
    //funckje testowe
    /*
    Notka dla nauczyciela:
    testy zawierają tyle if-ów aby dopasować
    wartość zmiennej $expected do podanych
    danych
    */

    public function testGenerateLabel() {

        $labelText = "LabelTest";
        $labelId = "LabelTestID";
        $labelName = "LabelTestName";

        if($labelId == null and $labelName == null){
            $expected = '<label>' . $labelText . '</label>';
            $actual = $this->instance->generateLabel($labelText);
        }
        else if($labelId != null and $labelName == null){
            $expected = '<label id="'. $labelId . '">' . $labelText . '</label>';
            $actual = $this->instance->generateLabel($labelText, $labelId, $labelName);
        }
        else if($labelId == null and $labelName != null){
            $expected = '<label name="' . $labelName . '">' . $labelText . '</label>';
            $actual = $this->instance->generateLabel($labelText, $labelId, $labelName);
        }
        else{
            $expected = '<label id="'. $labelId . '" name="' . $labelName . '">' . $labelText . '</label>';
            $actual = $this->instance->generateLabel($labelText, $labelId, $labelName);
        }
        
        $this->assertEquals($expected, $actual);
    }

    public function testGenerateButton(){

        $buttonText = "ButtonTest";
        $buttonId = "ButtonTestID";
        $buttonName = "ButtonTestName";

        if($buttonId == null and $buttonName == null){
            $expected = '<button>' . $buttonText . '</button>';
            $actual = $this->instance->generateButton($buttonText);
        }
        else if($buttonId != null and $buttonName == null){
            $expected = '<button id="'. $button . '">' . $buttonText . '</button>';
            $actual = $this->instance->generateButton($buttonText, $buttonId, $buttonName);
        }
        else if($buttonId == null and $buttonName != null){
            $expected = '<button name="' . $buttonName . '">' . $buttonText . '</button>';
            $actual = $this->instance->generateButton($buttonText, $buttonId, $buttonName);
        }
        else{
            $expected = '<button id="'. $buttonId . '" name="' . $buttonName . '">' . $buttonText . '</button>';
            $actual = $this->instance->generateButton($buttonText, $buttonId, $buttonName);
        }

        $this->assertEquals($expected, $actual);
    }

    public function testGenerateInput(){

        $inputType = "radio";
        $inputValue = "opcja1";
        $inputId = null;
        $inputName = "radio";

        if($inputValue == null and $inputId == null and $inputName == null){
            $expected = '<input type="' . $inputType . '">';
            $actual = $this->instance->generateInput($inputType);
        }
        if($inputValue != null and $inputId == null and $inputName == null){
            $expected = '<input type="' . $inputType . '" value="' . $inputValue . '">';
            $actual = $this->instance->generateInput($inputType, $inputValue);
        }
        if($inputValue == null and $inputId != null and $inputName == null){
            $expected = '<input type="' . $inputType . '" id="' . $inputId . '">';
            $actual = $this->instance->generateInput($inputType, $inputValue, $inputId);
        }
        if($inputValue == null and $inputId == null and $inputName != null){
            $expected = '<input type="' . $inputType . '" name="' . $inputName . '">';
            $actual = $this->instance->generateInput($inputType, $inputValue, $inputId, $inputName);
        }
        if($inputValue != null and $inputId != null and $inputName == null){
            $expected = '<input type="' . $inputType . '" value="' . $inputValue . '" id="' . $inputId . '">';
            $actual = $this->instance->generateInput($inputType, $inputValue, $inputId);
        }
        if($inputValue != null and $inputId == null and $inputName != null){
            $expected = '<input type="' . $inputType . '" value="' . $inputValue . '" name="' . $inputName . '">';
            $actual = $this->instance->generateInput($inputType, $inputValue, $inputId, $inputName);
        }
        if($inputValue == null and $inputId != null and $inputName != null){
            $expected = '<input type="' . $inputType . '" id="' . $inputId . '" name="' . $inputName . '">';
            $actual = $this->instance->generateInput($inputType, $inputValue, $inputId, $inputName);
        }
        if($inputValue != null and $inputId != null and $inputName != null){
            $expected = '<input type="' . $inputType . '" value="' . $inputValue . '" id="' . $inputId . '" name="' . $inputName . '">';
            $actual = $this->instance->generateInput($inputType, $inputValue, $inputId, $inputName);
        }
        
        $this->assertEquals($expected, $actual);
    }

    /*Dla tego testu ustalimy 1 wartość expected, ponieważ inaczej zajęło by to wieczność */
    public function testGenerateForm(){
        $formAction = "skrypt.js";
        $formMethod = "post";
        $form_data = [
            ["label","Przykladowy formularz"],
            ["br"],
            ["input", "text", "text", "text_input"],
            ["br"],
            ["button", "Wyczysc"],
            ["input", "submit", "Submit"]
        ];

        $expected = '<form action="' . $formAction . '" method="' . $formMethod . '"><label>Przykladowy formularz</label><br><input type="text" value="text" id="text_input"><br><button>Wyczysc</button><input type="submit" value="Submit"></form>';
        $actual = $this->instance->generateForm($formAction, $formMethod, $form_data);
        $this->assertEquals($expected, $actual);
    }

}

?>