<?php

interface Iserviceinserur{
    function insert (Insurer $insurer);
    function edit(insurer $insurer);
    function delete($id);
    function display();
    function search($query);

}
 ?>