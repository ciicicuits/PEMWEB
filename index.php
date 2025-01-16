<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Bunga</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet"/>
    <body class="bg-gray-100 text-gray-800"> 
    <div class="container mx-auto px-4"> 
        <!-- Header --> 
        <div class="w-full mb-4"> 
          <?php include_once 'header.php'; ?> 
        </div> 
        <!-- Menu --> 
        <div class="w-full mb-4"> 
          <?php include_once 'menu.php'; ?> 
        </div> 
        <!-- Main Content & Sidebar --> 
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-4"> 
          <!-- Main Content --> 
          <div class="col-span-3 bg-white p-6 shadow rounded"> 
            <?php 
            $req = isset($_REQUEST['hal']) ? $_REQUEST['hal'] : '';  
 
            if (!empty($req)) { 
                include_once $req.'.php'; 
            } else { 
                include_once 'home.php'; 
            } 
            ?> 
          </div> 
          <!-- Sidebar --> 
          <div class="col-span-1 bg-white p-6 shadow rounded flex flex-col items-center"> 
            <?php include_once 'sidebar.php'; ?> 
          </div> 
        </div>  
        <!-- Footer --> 
        <div class="w-full mt-6 bg-white p-6 shadow rounded"> 
          <?php include_once 'footer.php'; ?> 
        </div> 
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script> 
    </body>
</html>