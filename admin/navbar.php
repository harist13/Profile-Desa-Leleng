<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Responsif</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
        }
        
        .navbar {
            background-color: #003366;
            overflow: hidden;
        }
        
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        
        .navbar .icon {
            display: none;
        }

          .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input, 
        .form-group textarea, 
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #002244;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .admin-table th, .admin-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .admin-table th {
            background-color: #003366;
            color: white;
        }

        .admin-table tr:hover {
            background-color: #f2f2f2;
        }

        .admin-table a {
            color: #00509E;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .admin-table a:hover {
            color: #003366;
        }

        /* Responsive table styles */
        @media screen and (max-width: 600px) {
            .admin-table thead {
                display: none;
            }

            .admin-table, .admin-table tbody, .admin-table tr, .admin-table td {
                display: block;
                width: 100%;
            }

            .admin-table tr {
                margin-bottom: 10px;
                background-color: #fff;
                box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
            }

            .admin-table td {
                position: relative;
                padding-left: 50%;
                text-align: right;
                border: none;
                border-bottom: 1px solid #ddd;
            }

            .admin-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-left: 10px;
                font-weight: bold;
                text-align: left;
                color: #333;
            }

            .admin-table td:last-child {
                border-bottom: none;
            }
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .message.success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        .message.error {
            background-color: #f2dede;
            color: #a94442;
        }
        
        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) {
                display: none;
            }
            .navbar a.icon {
                float: right;
                display: block;
            }
        }
        
        @media screen and (max-width: 600px) {
            .navbar.responsive {
                position: relative;
            }
            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
                border-top: 1px solid #00509E; /* Pembatas antar menu */
            }
            .navbar.responsive a:first-child {
                border-top: none;
            }
        }
        
        @media screen and (max-width: 600px) {
            .navbar a:not(:first-child) {display: none;}
            .navbar a.icon {
                float: right;
                display: block;
            }
        }
        
        @media screen and (max-width: 600px) {
            .navbar.responsive {position: relative;}
            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }

       
    </style>
</head>
<body>
    <nav class="navbar" id="myNavbar">
        <a href="profile.php">Profile</a>
        <a href="register.php">Register Admin</a>
        <a href="beranda.php">Beranda</a>
        <a href="tentang.php">Tentang</a>
        <a href="galeri.php">Galeri</a>
        <a href="berita.php">Berita</a>
        <a href="tim_staff.php">Tim dan Staff</a>
        <a href="logout.php">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">&#9776;</a>
    </nav>


    <script>
        function toggleNavbar() {
            var x = document.getElementById("myNavbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>
</body>
</html>