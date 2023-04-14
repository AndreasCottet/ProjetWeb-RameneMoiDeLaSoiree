<?php

class ModelBase {

    public function objectToArray()
    {
        $equivalenceTab = $this->equivalence();
        $typeField = $this->getTypeField();
        $array = [];
        foreach($this as $key => $value)
        {
            if(empty($value))
                continue;
            $array[$equivalenceTab[$key]] = $value;
            if($typeField[$key] == "string")
                $array[$equivalenceTab[$key]] = "'".$value."'";
        }
        return $array;
    }

    public function arrayToObject($array)
    {
        $equivalenceTab = $this->equivalence();
        $typeField = $this->getTypeField();
        foreach($array as $key => $value)
        {
            $field = array_search($key, $equivalenceTab);
            $this->$field = $value;
        }
    }

    public function getFieldMissing()
    {
        $fieldMissing = [];
        foreach($this as $key => $value) {
            if(in_array($key, $this->fieldRequired())) {
                if(empty($value)) {
                    $fieldMissing[] = $key;
                }
            }
        }
        return $fieldMissing;
    }
}