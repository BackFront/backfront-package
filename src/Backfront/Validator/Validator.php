<?php

namespace Backfront\Validator {

    abstract class Validator extends \Rakit\Validation\Validator implements IValidator
    {
        public $rules;
        public $datas;

        public function getRules()
        {
            return $this->rules;
        }

        public function with(array $datas)
        {
            $this->datas = $datas;
            return $this;
        }


        public function passesOrFail($returnObject = false)
        {
            $validation = $this->make($this->datas, $this->rules);
            $validation->validate();

            if($validation->fails()) {
                $errors = $validation->errors();
                //print_r($errors->firstOfAll());
                return $errors->all();
            } else {
                return true;
            }
        }
    }

}
