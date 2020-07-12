<?php

class Musician {

    public function playInstrument($instrument){
        if ($instrument instanceof Soundcreator) {
            echo 'Instrument checked <br>';
            $instrument->produceSound();
        } else {
            echo 'This instrument does not belong to Soundcreator.';
        }

    }
}