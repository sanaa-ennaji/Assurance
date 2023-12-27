<?php

 interface Iserviceclient{
     function insert(Client $client);
     function edit(Client $client);
     function delete($id);
     function display();
     function search($query);

   
 }




?>