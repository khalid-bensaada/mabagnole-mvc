<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaBagnole | Vehicle Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-50 font-sans leading-normal">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="#" class="text-2xl font-black text-blue-600">Ma<span class="text-slate-800">Bagnole</span></a>
            <a href="index.php" class="text-sm font-bold text-slate-500 hover:text-blue-600 transition">
                <i class="fas fa-arrow-left mr-2"></i> Back to Fleet
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-8 md:py-12">
        <div class="flex flex-col lg:flex-row gap-8">

            <div class="lg:w-2/3">
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200 mb-8">
                    <img src="https://images.unsplash.com/photo-1542362567-b07e54358753" alt="Car Display"
                        class="w-full h-[450px] object-cover">
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm text-center">
                        <i class="fas fa-cog text-blue-600 mb-2"></i>
                        <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest">Transmission</p>
                        <p class="font-bold text-slate-800">Manuelle</p>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm text-center">
                        <i class="fas fa-gas-pump text-blue-600 mb-2"></i>
                        <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest">Fuel</p>
                        <p class="font-bold text-slate-800">Essence</p>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm text-center">
                        <i class="fas fa-calendar-check text-blue-600 mb-2"></i>
                        <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest">Year</p>
                        <p class="font-bold text-slate-800">2019</p>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm text-center">
                        <i class="fas fa-palette text-blue-600 mb-2"></i>
                        <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest">Color</p>
                        <p class="font-bold text-slate-800">Blanc</p>
                    </div>
                </div>

                <section class="bg-white rounded-3xl p-6 md:p-10 border border-slate-200 shadow-sm">
                    <h3 class="text-2xl font-bold text-slate-800 mb-8">Customer Feedback</h3>
                    <div class="space-y-8">
                        <div class="border-b border-slate-100 pb-8 last:border-0">
                            <div class="flex items-center gap-3 mb-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600">
                                    JD</div>
                                <div>
                                    <h4 class="font-bold text-slate-800">John Doe</h4>
                                    <div class="flex text-yellow-400 text-[10px]">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-slate-600 italic leading-relaxed">"Très bon service, véhicule propre et bien
                                entretenu."</p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="lg:w-1/3">
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xl sticky top-24">
                    <div class="mb-6">
                        <span class="text-blue-600 font-bold text-xs uppercase tracking-widest">Premium Selection</span>
                        <h2 class="text-3xl font-black text-slate-800 mt-1">Dacia Logan</h2>
                    </div>

                    <div class="flex items-baseline gap-1 mb-6">
                        <span class="text-5xl font-black text-slate-900">280</span>
                        <span class="text-slate-400 font-medium">MAD/ total</span>
                    </div>

                    <form action="process_booking.php" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-[11px] font-black uppercase text-slate-400 mb-2">Pick-up
                                location</label>
                            <select name="location"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                                <option>Select Location</option>
                                <option value="airport">Marrakech Menara Airport (RAK)</option>
                                <option value="center">Casablanca City Center</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] font-black uppercase text-slate-400 mb-2">Date
                                    Début</label>
                                <input type="date" name="start_date"
                                    class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-[11px] font-black uppercase text-slate-400 mb-2">Date
                                    Fin</label>
                                <input type="date" name="end_date"
                                    class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 mt-2">
                            <label class="block text-[11px] font-black uppercase text-slate-400 mb-2">Option
                                Supplémentaire</label>
                            <select name="extra_option"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="0">No Extra Options</option>
                                <option value="1">GPS Navigation (+150 MAD)</option>
                                <option value="2">Child Seat (+100 MAD)</option>
                            </select>
                        </div>

                        <button type="submit"
                            class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold text-lg hover:bg-blue-600 transition shadow-lg mt-6 active:scale-95">
                            Confirmer la Réservation
                        </button>
                    </form>

                    <div
                        class="bg-red-50 border border-red-100 text-red-600 px-4 py-3 rounded-xl mt-6 text-sm text-center">
                        You must be logged in to reserve.
                        <a href="login.php" class="font-bold underline">Sign In</a>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>

</html>