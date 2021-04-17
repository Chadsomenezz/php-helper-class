<?php


class HTML_Helper{
    function __construct($obj){
        $this->obj = $obj;
        $this->th_or_td = "th";
        $this->how_many_cell = count($obj[0]);
        $this->cell_count = 0;
    }

    function print_table(){
        echo "<table>";
        for ($i=0;$i<count($this->obj);$i++){
            echo "<tr>";
            foreach ($this->obj[$i] as $value){
                if($this->th_or_td === "th"){
                   echo "<th>$value</th>";
                   $this->cell_count++;
                   if ($this->cell_count >= $this->how_many_cell){
                       $this->th_or_td = "td";
                   }

                }else if($this->th_or_td === "td"){
                    echo "<td>$value</td>";
                };
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    function print_select($name, $obj){
        echo "<select name='$name'>";
        foreach ($obj as $value){
            echo "<option value='$value'>$value</option>";
        }
        echo "</select>";
    }
}

$database = [
    ["first_name","last_name","nick_name"],
    ["Richard","Ramos","Chad"],
    ["bot1","robot","chabot"],
    ["bot2","robot2","chabot2"],
    ["bot3","robot3","chabot3"],
];
$sample_array = ["CA", "WA", "UT", "TX", "AZ", "NY"];

$me = new HTML_Helper($database);

$me->print_table();
$me->print_select("state",$sample_array);