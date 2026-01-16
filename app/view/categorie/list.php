<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MaBagnole | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">

    <nav class="bg-white shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-50">
        <h1 class="text-2xl font-bold text-blue-600">🚗 MaBagnole</h1>
        <div class="flex items-center space-x-6">
            <div class="hidden md:flex space-x-6 font-medium">
                <a href="index.php" class="hover:text-indigo-600">Home</a>
                <a href="commentaire.php" class="hover:text-indigo-600">comments</a>
                <a href="blog.php" class="hover:text-indigo-600">blog</a>
                <a href="add_article.php" class="hover:text-indigo-600">article</a>
            </div>

            <div class="flex items-center space-x-2 bg-blue-50 px-4 py-2 rounded-lg">
                <i class="fas fa-user-circle text-blue-600"></i>
                <span class="font-medium text-blue-800 text-sm">Welcome, Client!</span>
            </div>
            <a href="blog.php" class="text-red-500 hover:text-red-700 text-sm font-bold">log out</a>
        </div>
    </nav>

    <header class="bg-blue-600 py-12 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Find Your Perfect Ride</h2>
            <div class="max-w-2xl mx-auto bg-white p-2 rounded-xl flex shadow-lg">
                <input type="text" placeholder="Search by model or brand..."
                    class="flex-1 px-4 outline-none text-gray-700">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold mb-6 text-center">Toutes les voitures disponibles</h1>

            <?php if (!empty($allVehicles)): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <?php foreach ($allVehicles as $v): ?>
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="relative h-48 bg-gray-200">
                                <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=500&q=80"
                                    alt="<?= htmlspecialchars($v['modele']) ?>" class="w-full h-full object-cover">
                                <?php if ($v['disponibilite']): ?>
                                    <span
                                        class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">Disponible</span>
                                <?php else: ?>
                                    <span
                                        class="absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">Indisponible</span>
                                <?php endif; ?>
                            </div>

                            <div class="p-5">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-xl font-bold text-gray-800"><?= htmlspecialchars($v['modele']) ?></h4>
                                    <span class="text-blue-600 font-extrabold"><?= number_format($v['prix'], 2) ?> <span
                                            class="text-xs text-gray-400">MAD / jour</span></span>
                                </div>

                                <p class="text-gray-500 text-sm mb-4">Category: <span
                                        class="font-medium"><?= htmlspecialchars($v['categorie']) ?></span></p>

                                <div class="flex items-center space-x-4 text-gray-400 text-sm mb-6 border-t pt-4">
                                    <span><i class="fas fa-gas-pump mr-1"></i> Diesel</span>
                                    <span><i class="fas fa-cog mr-1"></i> Auto</span>
                                    <span><i class="fas fa-user-friends mr-1"></i> 5 Seats</span>
                                </div>

                                <!-- Button View Details -->
                                <button
                                    class="w-full bg-gray-900 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition"><a
                                        href="details.php">View Details</a>

                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php else: ?>
                <p class="text-center text-gray-600">Aucune voiture disponible pour le moment.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer class="text-center py-10 text-gray-400 text-sm border-t mt-12">
        &copy; 2026 MaBagnole Rental. All rights reserved.
    </footer>

</body>

</html>