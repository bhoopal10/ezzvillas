<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bhoo
 * Date: 11/09/13
 * Time: 00:29
 * To change this template use File | Settings | File Templates.
 */

class stringlib {
    public static function Trunc($string,$len,$link)
    {
        if(strlen($string)>$len)
        {
            $new_string= substr($string,0,$len-1).'...';
            $markup="<a href=\"$link\" data-toggle=\"tooltip\" title=\"$string\">".$new_string.'</a>';
        }
        else{
            $markup="<a href=\"$link\" data-toggle=\"tooltip\" title=\"$string\">".$string.'</a>';
        }
        return $markup;
    }
    public static function ReadMore($string,$len,$link)
    {
        if(strlen($string)>$len)
        {
            $new_string=substr($string,0,$len)."...<a href=\"$link\"><button class=\"btn-primary\" style=\"align:left\">ReadMore</button></a>";
            $res=$new_string;
        }
        else{
            $res=$string."...<a href=\"$link\"><button class=\"btn-primary\" style=\"align:left\">ReadMore</button></a>";
        }
        return $res;
    }


}