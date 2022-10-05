<?php

namespace App\_11abstractClassesAndMethods;

/* 2~ create the child class field */

class Text extends Field{
    /* 9~ implement the render method on abstract parent class */
    public function render(): string {
        return <<<HTML
        <input type='text' name="{$this->name}">
        HTML;
    }
}

?>