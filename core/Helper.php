<?php

class Helper {
    
    public function getUrl($controller = DEFAULT_CONTROLLER, $action = DEFAULT_ACTION) {
        return "index.php?controller=".$controller."&action=".$action;
    }
}

?>