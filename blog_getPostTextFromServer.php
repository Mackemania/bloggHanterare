<?PHP

    $data = $_REQUEST["source"];

    $sources = explode(",", $data);
    
    $post="";
    for($i = 1; $i<count($sources); $i++) {
        
        $src = $sources[$i];
        //echo($src);
        $postFile = fopen($src, "r");
        $post = $post."&".fread($postFile, filesize($src));
        fclose($postFile);
        
    }

    echo($post);
    
?>