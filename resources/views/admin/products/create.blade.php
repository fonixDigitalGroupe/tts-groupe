@extends('admin.layout')

@section('title', 'Nouveau Produit')
@section('page_title', 'Produits')

@section('content')
<div class="max-w-4xl mx-auto space-y-10 pb-20">
    
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Ajouter un produit</h2>
        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-800 font-bold transition-all uppercase text-xs tracking-widest">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Retour à la liste
        </a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="premium-card p-8 space-y-8">
        @csrf
        
        <div class="space-y-6">
            <!-- Section 1: Identification & Classification -->
            <div class="section-group">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Désignation complète</label>
                        <input type="text" name="name" required 
                               class="input-field input-capitalize font-medium h-10">
                    </div>
                    
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Catégorie</label>
                        <div class="relative">
                            <select name="category_id" required
                                    class="input-field appearance-none h-10" 
                                    style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2364748b%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222.5%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.2em;">
                                <option value="">Sélectionner</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Classification Selector -->
                <div class="mt-4">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Mise en avant (Classification)</label>
                    <div class="relative">
                        <select name="classification"
                                class="input-field appearance-none h-10" 
                                style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2364748b%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222.5%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.2em;">
                            <option value="none">Standard (Aucune)</option>
                            <option value="new" selected>Nouveauté</option>
                            <option value="featured">Équipement Phare</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section 2: Tarification & Stock -->
            <div class="section-group">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Prix de vente (FCFA)</label>
                        <div>
                            <input type="number" name="price" step="0.01" 
                                   class="input-field font-black h-10" placeholder="0">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Stock initial</label>
                        <div>
                            <input type="number" name="stock" 
                                   class="input-field font-bold h-10" placeholder="0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Description -->
            <div class="section-group">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Description détaillée</label>
                <textarea name="description" rows="5" 
                          class="input-field py-4 leading-relaxed bg-slate-50/30" 
                          placeholder="Décrivez les caractéristiques techniques et les avantages du produit..."></textarea>
            </div>

            <!-- Section 4: Médias -->
            <div class="section-group">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-black">Galerie d'images (Max 3)</label>
                
                <!-- Gallery Frame matching textarea style (radius, border, background, no-shadow) -->
                <div class="p-4 border border-slate-200 rounded-xl bg-slate-50/30">
                    <div class="flex flex-wrap gap-4" id="gallery-grid">
                        <!-- Dropzone (Fixed size) -->
                        <div id="dropzone-container" class="relative group w-20 h-20">
                            <input type="file" name="images[]" id="product-images" multiple accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                            <div class="w-full h-full border-dashed border-2 border-slate-200 rounded-xl flex items-center justify-center group-hover:border-[#00A3A2] group-hover:bg-[#00A3A2]/5 transition-all bg-white/50">
                                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </div>
                            </div>
                        </div>

                        <!-- Previews will be injected here -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            let selectedFiles = [];

            document.getElementById('product-images').addEventListener('change', function(e) {
                const newFiles = Array.from(this.files);
                const spaceLeft = 3 - selectedFiles.length;
                
                if (spaceLeft > 0) {
                    selectedFiles = [...selectedFiles, ...newFiles.slice(0, spaceLeft)];
                    renderGallery();
                    updateFileInput();
                }
            });

            function renderGallery() {
                const grid = document.getElementById('gallery-grid');
                const dropzone = document.getElementById('dropzone-container');
                
                // Clear previews (keep dropzone)
                const previews = grid.querySelectorAll('.preview-item');
                previews.forEach(p => p.remove());

                // Create and insert previews
                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const div = document.createElement('div');
                        div.className = 'preview-item relative w-20 h-20 group/item';
                        div.innerHTML = `
                            <img src="${event.target.result}" class="w-full h-full object-cover rounded-xl border border-slate-100 shadow-sm">
                            <button type="button" onclick="removeFile(${index})" 
                                    class="absolute -top-1.5 -right-1.5 w-6 h-6 bg-red-500 text-white rounded-lg flex items-center justify-center transition-all hover:bg-red-600 z-30 shadow-md">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        `;
                        // Insert BEFORE the dropzone
                        grid.insertBefore(div, dropzone);
                    };
                    reader.readAsDataURL(file);
                });

                // Toggle dropzone visibility
                if (selectedFiles.length >= 3) {
                    dropzone.classList.add('hidden');
                } else {
                    dropzone.classList.remove('hidden');
                }
            }

            function removeFile(index) {
                selectedFiles.splice(index, 1);
                renderGallery();
                updateFileInput();
            }

            function updateFileInput() {
                const fileInput = document.getElementById('product-images');
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                fileInput.files = dataTransfer.files;
            }
        </script>

        <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-4 pt-8">
            <a href="{{ route('admin.products.index') }}" class="w-full sm:w-auto text-center px-8 py-3 text-sm font-extrabold text-slate-400 hover:text-slate-600 transition-all uppercase tracking-widest">
                Annuler
            </a>
            <button type="submit" class="w-full sm:w-auto btn-primary px-12 py-4 h-auto text-sm uppercase tracking-widest shadow-xl shadow-[#00A3A2]/20">
                Publier le produit
            </button>
        </div>
    </form>
</div>
@endsection
