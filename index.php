<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guessing Game</title>

    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>
<body>
    <div class="container start-box">
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title center"><strong>Guessing Game</strong> - Let's play?</h3>
            </div>
            <div class="panel-body">
                <form class="needs-validation" action="game.php" method="POST">
                <!--form class="" data-example-id="simple-input-groups"--> 
                    <div class="input-group"> 
                        <span class="input-group-addon" id="basic-addon1">X</span> 
                        <input type="number" name="collums" class="form-control" placeholder="Collums" aria-describedby="basic-addon1"  min="3" max="30" required> 
                        <span class="validity"></span>
                    </div> 
                    <div class="input-group"> 
                        <span class="input-group-addon" id="basic-addon1">Y</span> 
                        <input type="number" name="rows" class="form-control" placeholder="Rows" aria-describedby="basic-addon1" min="2" max="20" required> 
                        <span class="validity"></span> 
                    </div>  
                    <button type="submit" class="btn btn-primary btn-lg center-block play">Play</button>
                </form>
                <div class="author"><a href="https://www.linkedin.com/in/arcadio-macedo/">Arcadio Macedo <i class="fab fa-linkedin"></i></a></div>
            </div>
        </div>
    </div>
     
</body>
</html>