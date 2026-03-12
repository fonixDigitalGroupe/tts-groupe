<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-2xl md:text-4xl font-semibold text-blue-950 mb-4 tracking-tight">Nos équipes en action</h2>
            <div class="w-20 h-1.5 bg-orange-500 mx-auto rounded-full mb-8"></div>
            <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">
                Découvrez notre expertise sur le terrain et en bureau d'études à travers les interventions de nos équipes qualifiées.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Image 1 -->
            <div class="relative group overflow-hidden rounded-[2rem] shadow-sm aspect-square bg-gray-100 border border-gray-100">
                <img src="{{ asset('images/equipe_1.png') }}"
                     onerror="this.onerror=null;this.src='{{ asset('images/equipe_3.png') }}';"
                     alt="Équipe terrain - Densification K46"
                     class="w-full h-full object-cover">
                
                <!-- Badge -->
                <div class="absolute top-6 left-6 z-10 px-3 py-1 bg-blue-950/80 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-full">
                    Terrain
                </div>

                <!-- Info Overlay -->
                <div class="absolute inset-x-4 bottom-4 z-10 p-5 backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl">
                    <h4 class="text-white font-bold text-sm leading-tight">Équipe terrain - Densification K46</h4>
                    <div class="w-8 h-1 bg-orange-500 mt-3 rounded-full"></div>
                </div>
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
            </div>

            <!-- Image 2 -->
            <div class="relative group overflow-hidden rounded-[2rem] shadow-sm aspect-square bg-gray-100 border border-gray-100">
                <img src="{{ asset('images/equipe_2.png') }}"
                     onerror="this.onerror=null;this.src='{{ asset('images/equipe_4.png') }}';"
                     alt="Intervention sur poteau - Traverse Senelec"
                     class="w-full h-full object-cover">
                
                <!-- Badge -->
                <div class="absolute top-6 left-6 z-10 px-3 py-1 bg-blue-950/80 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-full">
                    Technique
                </div>

                <!-- Info Overlay -->
                <div class="absolute inset-x-4 bottom-4 z-10 p-5 backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl">
                    <h4 class="text-white font-bold text-sm leading-tight">Intervention sur poteau - Traverse Senelec</h4>
                    <div class="w-8 h-1 bg-orange-500 mt-3 rounded-full"></div>
                </div>

                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
            </div>

            <!-- Image 3 -->
            <div class="relative group overflow-hidden rounded-[2rem] shadow-sm aspect-square bg-gray-100 border border-gray-100">
                <img src="{{ asset('images/equipe_3.png') }}" alt="Soudeuse fibre optique Sumitomo" 
                     class="w-full h-full object-cover">
                
                <!-- Badge -->
                <div class="absolute top-6 left-6 z-10 px-3 py-1 bg-blue-950/80 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-full">
                    Équipement
                </div>

                <!-- Info Overlay -->
                <div class="absolute inset-x-4 bottom-4 z-10 p-5 backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl">
                    <h4 class="text-white font-bold text-sm leading-tight">Soudeuse fibre optique Sumitomo</h4>
                    <div class="w-8 h-1 bg-orange-500 mt-3 rounded-full"></div>
                </div>

                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
            </div>

            <!-- Image 4 -->
            <div class="relative group overflow-hidden rounded-[2rem] shadow-sm aspect-square bg-gray-100 border border-gray-100">
                <img src="{{ asset('images/equipe_4.png') }}" alt="Présence sur site N00" 
                     class="w-full h-full object-cover">
                
                <!-- Badge -->
                <div class="absolute top-6 left-6 z-10 px-3 py-1 bg-blue-950/80 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest rounded-full">
                    Expertise
                </div>

                <!-- Info Overlay -->
                <div class="absolute inset-x-4 bottom-4 z-10 p-5 backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl">
                    <h4 class="text-white font-bold text-sm leading-tight">Présence sur site N00</h4>
                    <div class="w-8 h-1 bg-orange-500 mt-3 rounded-full"></div>
                </div>

                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
            </div>
        </div>
    </div>
</section>
