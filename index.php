<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Tree</title>
</head>
<body>
    <?php   
        $string = file_get_contents("json.json");
        $arr = json_decode($string, true);
        $output = "";
        function demonstrate($arr) {
            global $output;
            $output .= "<ul>";
            foreach ($arr as $value) {
                if ($value["isFolder"] == true) {
                    $output .= "<li class='folder'>" . $value["title"] . "</li>"; 
                    demonstrate($value["children"]);
                } else {
                    $output .= "<li class='item'>" . $value["title"] . "</li>";
                }
            }
            $output .= "</ul>";
        }  
        demonstrate($arr);
        echo $output;
    ?>
</body>
</html>