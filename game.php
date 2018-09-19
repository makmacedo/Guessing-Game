<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <!--Personalized stylesheet-->
    <link rel="stylesheet" href="css/game.css">

    <!--Jquery import-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <!--Bootstrap imports-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!--Icons imports-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
  
<?php 
    /** defines x parameter */
    if(isset($_POST['collums'])){
        $x = $_POST['collums']; 
    } else if(isset($_GET['collums'])){
        $x = $_GET['collums'];
    } else {
        $x = 12; /** default x value when not set */
    }

    /** defines y parameter */
    if(isset($_POST['rows'])){
        $y = $_POST['rows'];
    } else if(isset($_GET['rows'])){
        $y = $_GET['rows'];
    } else {
        $y = 7; /** default y value when not set */
    }

    /** define the winning square position */
    $win_y = rand ( 1 , $y );
    $win_x = rand ( 1 , $x );  
?>

<!--variable gameboard style depending on collums-->
<?php 
    echo '<style>';
    echo '  .gameboard { ';
    echo '    grid-template-columns: repeat(' . $x . ', 0.5fr); ';
    echo '  }';
    echo '</style>';
?>

<audio id="music" autoplay="autoplay"> <!--Add background music to the game-->
    <source src="music/soft_8bit.mp3" type="audio/mp3">
</audio>

<body>
    <nav class="navbar navbar">
        <div class="container">
            <div class="navbar-header">
                <h2 class="navbar-brand" href="#"><i class="fab fa-buromobelexperte"></i> Simple Guessing Game</h2>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <?php echo '<li><a href="game.php?collums='.$x.'&rows='.$y.'"><i class="fas fa-redo"></i> Restart</a></li>'; ?>
                <li><a href="index.php"><i class="fas fa-th"></i> Grid</a></li> 
                <li><a id="play" style="display:none"><i class="fas fa-play"></i></a></li>
                <li><a id="pause"><i class="fas fa-pause"></i></a></li>
            </ul>
        </div>
    </nav>

    <div class="gameboard"> 
        <?php 
        for ($row = 1; $row <= $y; $row++) {
            for ($col = 1; $col <= $x; $col++) {
                if ($col == $win_x && $row == $win_y){ 
                    /** Add winning square*/
                    echo '<div id="winner" class="square"><i class="fa fa-trophy"></i></div>';
                } else { 
                    /** Add other squares*/
                    echo '<div id="square_' . $col . '_' . $row . '" class="square">';
                        /** Calc the distance */
                        $dx = $col - $win_x;
                        $dy = $row - $win_y;
                        /** Get the distance module */
                        if ($dx < 0) {  $dx = -1*$dx;  }
                        if ($dy < 0) {  $dy = -1*$dy;  }
                        /** Distance is equal to the farest point */
                        echo '<p class="info">' . max ($dx, $dy)  . '</p>';
                    echo '</div>';
                }
            } 
        }
        ?>
    </div>

    <!-- MSG when the player wins in the first guess -->
    <div id="bullseyes" class="message"> 
        <i class="fas fa-bullseye"></i> Bullseyes!!!
        <div>
            <?php echo '<a href="game.php?collums='.$x.'&rows='.$y.'"><button type="button" class="btn btn-info btn-lg">Play Again</button></a>'; ?>
        </div>
    </div>

    <!-- MSG when the player wins normal -->
    <div id="wincard" class="message"> 
        <i class="fas fa-award"></i> congratulations!
        <div>
            <?php echo '<a href="game.php?collums='.$x.'&rows='.$y.'">'?>
            <button type="button" class="btn btn-info btn-lg">Play Again</button></a>
        </div>
    </div>

    <!-- MSG when the player tries all squares without success-->
    <div id="youlose" class="message"> 
        <i class="fas fa-exclamation-circle"></i> You shall not pass!!!
        <div>
            <?php echo '<a href="game.php?collums='.$x.'&rows='.$y.'"><button type="button" class="btn btn-info btn-lg">Try Again</button></a>'; ?>
        </div>
    </div>

    <!--for debugging-->
    <?php # echo "x = " . $x . " | y = " . $y . " | winner = " . $win_x . '/' . $win_y; ?> 
</body>

<script>
    var count = 0;

    $('#pause').click(function(){ /** pause the music and change the icon */
        document.getElementById('music').pause(); 
        $('#play').show();
        $('#pause').hide();
    });

    $('#play').click(function(){ /** play the music and change the icon */
        document.getElementById('music').play(); 
        $('#play').hide();
        $('#pause').show();
    });

    $('#winner').click(function() { /** show the winning messages */
        if(count == 0){
            $('#bullseyes').show();
        } else {
            $('#wincard').show(); 
        }
        $('#winner i').show();
        $('#winner').css({ 'background-color': "#289bbe" });
    });

    <?php 
        for ($row = 1; $row <= $y; $row++) {
            for ($col = 1; $col <= $x; $col++) {        
                echo '$("#square_' . $col . '_' . $row . '").click(function() {';
                echo '    count++;'; /** count how many guesses */
                echo '    $("#square_' . $col . '_' . $row . ' p").css({"display": "block"});';
                echo '    $("#square_' . $col . '_' . $row . '").css({"background-color": "#289bbe"});'; 
                echo '    if (count == '.$y.' * '.$x.' - 1 ){'; /** if all attempts are exhausted*/
                echo '        $("#youlose").show();'; /** show losing message */
                echo '    }';
                echo '});';
            }
        }
    ?> 
</script>

</html>