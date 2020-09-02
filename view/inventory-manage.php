<?php include '../includes/header.php'; ?>
    <title>Manage Inventory</title>
    </head>
    <body>
    <!-- Navigation Bar -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Content    -->
    <div class="container-fluid">
        <!-- Top Row    -->


        <!-- Form   -->
            </div>

    <script>
        function changeButtonPencilToCheck() {
            document.getElementById("btn_service_name_pencil").style.visibility = 'hidden';
            document.getElementById("btn_service_name_check").style.visibility = 'visible';
        }

        function changeButtonCheckToPencil(){
            document.getElementById('btn_service_name_check').style.visibility = 'hidden';
            document.getElementById('btn_service_name_pencil').style.visibility = 'visible';
        }
    </script>

<?php include '../includes/footer.php' ?>