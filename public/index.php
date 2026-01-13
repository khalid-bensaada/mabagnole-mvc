<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaBagnole | Premium Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50 font-sans">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
            <div class="text-2xl font-bold text-blue-600">🚗 MaBagnole</div>
            <div class="hidden md:flex space-x-8 font-medium">
                <a href="#" class="hover:text-blue-600 transition">Fleet</a>
                <a href="#" class="hover:text-blue-600 transition">Categories</a>
                <a href="#" class="hover:text-blue-600 transition">Blog</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="login.php" class="text-gray-600 hover:text-blue-600">Login</a>
                <a href="sign.php"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">Sign up</a>
            </div>
        </div>
    </nav>

    <header class="relative bg-blue-900 text-white py-20 px-4">
        <div class="max-w-7xl mx-auto flex flex-col items-center text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6">Drive Your Dream Today</h1>
            <p class="text-lg text-blue-100 mb-10 max-w-2xl">Find the perfect vehicle for your next adventure. Easy
                booking, best prices, and premium service.</p>

            <div
                class="bg-white p-4 rounded-xl shadow-2xl flex flex-col md:flex-row gap-4 w-full max-w-4xl text-gray-800">
                <input type="text" placeholder="Model or Brand..."
                    class="flex-1 p-3 border rounded-lg focus:outline-blue-500">
                <select class="p-3 border rounded-lg bg-white">
                    <option>All Categories</option>
                    <option>SUV</option>
                    <option>Luxury</option>
                    <option>Economy</option>
                </select>
                <button
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition">Search</button>
            </div>
        </div>
    </header>

    <section class="max-w-7xl mx-auto py-16 px-4">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Our Fleet</h2>
                <p class="text-gray-500">Explore our wide range of categories</p>
            </div>
            <div class="flex gap-2">
                <button
                    class="px-4 py-2 bg-white border rounded-lg active:bg-blue-50 transition filter-btn">SUV</button>
                <button
                    class="px-4 py-2 bg-white border rounded-lg active:bg-blue-50 transition filter-btn">Sedan</button>
                <button
                    class="px-4 py-2 bg-white border rounded-lg active:bg-blue-50 transition filter-btn">Electric</button>
            </div>
        </div>

        <div id="car-grid" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=800&q=80"
                        alt="Car" class="object-cover h-full w-full">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">Porsche 911 Carrera</h3>
                        <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded">Available</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Category: Luxury</p>
                    <div class="flex justify-between items-center border-t pt-4">
                        <span class="text-2xl font-bold text-blue-600">$120<span
                                class="text-sm text-gray-400">/day</span></span>
                        <button
                            class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-600 transition">View
                            Details</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Simple JS for filter button visual feedback
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('bg-blue-600', 'text-white'));
                this.classList.add('bg-blue-600', 'text-white');
            });
        });
    </script>
</body>

</html>