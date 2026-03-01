<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nos Équipes en Action</h2>
            <div class="w-16 h-1 bg-blue-600 mx-auto rounded-full mb-6"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Découvrez notre expertise sur le terrain et en bureau d'études à travers les interventions de nos équipes qualifiées.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Image 1 -->
            <div class="relative group overflow-hidden rounded-2xl shadow-lg aspect-square">
                <img src="{{ asset('images/equipe_1.png') }}" alt="Intervention sur boîtier" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                    <h4 class="text-white font-bold text-lg">Intervention Réseau</h4>
                    <p class="text-gray-200 text-xs">Maintenance sur boîtier de distribution.</p>
                </div>
            </div>

            <!-- Image 2 -->
            <div class="relative group overflow-hidden rounded-2xl shadow-lg aspect-square">
                <img src="{{ asset('images/equipe_2.png') }}" alt="Raccordement sur poteau" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                    <h4 class="text-white font-bold text-lg">Raccordement Aérien</h4>
                    <p class="text-gray-200 text-xs">Installation de câbles fibre optique.</p>
                </div>
            </div>

            <!-- Image 3 -->
            <div class="relative group overflow-hidden rounded-2xl shadow-lg aspect-square">
                <img src="{{ asset('images/equipe_3.png') }}" alt="Soudure optique" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                    <h4 class="text-white font-bold text-lg">Soudure de Précision</h4>
                    <p class="text-gray-200 text-xs">Fusion optique en atelier mobile.</p>
                </div>
            </div>

            <!-- Image 4 -->
            <div class="relative group overflow-hidden rounded-2xl shadow-lg aspect-square">
                <img src="{{ asset('images/equipe_4.png') }}" alt="Bureau d'études et SIG" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                    <h4 class="text-white font-bold text-lg">Bureau d'Études</h4>
                    <p class="text-gray-200 text-xs">Conception SIG et Cartographie réseau.</p>
                </div>
            </div>
        </div>
    </div>
</section>
