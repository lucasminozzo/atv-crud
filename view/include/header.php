<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="">
    <style>
        /* Reset básico e fonte */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
    
        /* Container centralizado */
        .container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
    
        h3 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            color: #007bff;
        }
    
        /* Estilo do Formulário */
        .form-group {
            margin-bottom: 15px;
        }
    
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
    
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Garante que o padding não aumente a largura total */
            font-size: 14px;
        }
    
        input[type="text"]:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }
    
        /* Botões */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #28a745; /* Verde */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }
    
        .btn:hover {
            background-color: #218838;
        }
    
        .btn-voltar {
            background-color: #6c757d; /* Cinza */
            margin-left: 10px;
        }
    
        /* Tabela (para o listar.php) */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
    
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    
        th {
            background-color: #007bff;
            color: white;
        }
    
        tr:hover {
            background-color: #f1f1f1;
        }
        
        /* Centralizar ícones de ação */
        #ed, #rm {
            text-align: center;
            width: 60px;
        }
    </style>
</head>
<body>