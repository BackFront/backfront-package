<?php

namespace Backfront\Validator {

    interface IValidator
    {
        public function getRules();

        public function with(array $datas);

        public function passesOrFail();
    }

}