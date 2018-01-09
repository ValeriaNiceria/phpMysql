<form method="POST" enctype="multipart/form-data">
    <input type="file" name="fileUpload"/>

    <button type="submit">Enviar</button>
</form>

<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") { //Se o formulário for submetido ele entra nesse if

    $file = $_FILES["fileUpload"];

    if ($file["error"]) {
        throw new Exception ("Error: " . $file["error"]);
    }

    $dirUploads = "uploads";

    if (!is_dir($dirUploads)) { //Verifica se o diretório existe
        mkdir($dirUploads) or die ("Não foi possível criar a pasta!");
    }

    if (move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file['name'])) { // Move um arquivo enviado para uma nova localização
        
        echo "Upload realizado com sucesso!";

    } else {

        throw new Exception("Não foi possível realizar o upload!");
    
    }
}

?> 