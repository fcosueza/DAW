<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1: Candidatos finalistas</title>
    <style>
        .candidatoContainer{
          display:inline-block;
          width:49%;
          vertical-align:top;
          height: 400px;
          
        }
        .candidatoContainer img{
            max-width:150px;
            max-height:300px;
        }
    </style>
</head>
<body>
    <?php if(isset($mensaje)): ?>
        <h2><?=$mensaje?></h2>
    <?php endif; ?>
    <h1>¿Quién será el candidato ganador?</h1>        
    <?php echo $formulario_candidatos_markup; ?>
    
</body>
</html>