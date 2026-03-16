@extends('admin.layout')

@section('title', 'Modifier le Produit')
@section('page_title', 'Produits')

@section('content')
<div class="max-w-4xl mx-auto space-y-10 pb-20">
    
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Modifier le produit</h2>
        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-slate-800 font-bold transition-all uppercase text-xs tracking-widest">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Retour à la liste
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="premium-card p-8 space-y-8">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <!-- Section 1: Identification & Classification -->
            <div class="section-group">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Désignation du produit</label>
                        <input type="text" name="name" value="{{ $product->name }}" required 
                               class="input-field font-medium h-10">
                    </div>
                    
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Catégorie</label>
                        <div class="relative">
                            <select name="category_id" required
                                    class="input-field appearance-none h-10" 
                                    style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2364748b%22%3E%3Cpath stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222.5%22 d=%22M19 9l-7 7-7-7%22%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.2em;">
                                <option value="">Sélectionner</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                            <option value="none" {{ !$product->is_featured && !$product->is_new ? 'selected' : '' }}>Standard (Aucune)</option>
                            <option value="new" {{ $product->is_new ? 'selected' : '' }}>Nouveauté</option>
                            <option value="featured" {{ $product->is_featured ? 'selected' : '' }}>Équipement Phare</option>
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
                            <input type="number" name="price" value="{{ $product->price }}" step="0.01" 
                                   class="input-field font-black h-10">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Stock disponible</label>
                        <div>
                            <input type="number" name="stock" value="{{ $product->stock }}" 
                                   class="input-field font-bold h-10">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Description -->
            <div class="section-group">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Description complète</label>
                <textarea name="description" rows="5" 
                          class="input-field py-4 leading-relaxed bg-slate-50/30">{{ $product->description }}</textarea>
            </div>

            <!-- Section 4: Médias -->
            <div class="section-group">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5 font-black">Galerie d'images (Max 3)</label>
                
                <!-- Gallery Frame matching textarea style (radius, border, background, no-shadow) -->
                <div class="p-4 border border-slate-200 rounded-xl bg-slate-50/30">
                    <div class="flex flex-wrap gap-4" id="gallery-grid">
                        <!-- Existing Images (Fixed size) -->
                        @if(!empty($product->images))
                            @foreach($product->images as $img)
                                <div class="relative w-20 h-20 group/item existing-item" data-path="{{ $img }}">
                                    <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover rounded-xl border border-slate-100 shadow-sm">
                                    <button type="button" onclick="markForDeletion(this)" 
                                            class="absolute -top-1.5 -right-1.5 w-6 h-6 bg-red-500 text-white rounded-lg flex items-center justify-center transition-all hover:bg-red-600 z-30 shadow-md">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </div>
                            @endforeach
                        @endif

                        <!-- Dropzone (Fixed size) -->
                        <div id="dropzone-container" class="relative group w-20 h-20 {{ count($product->images ?? []) >= 3 ? 'hidden' : '' }}">
                            <input type="file" name="images[]" id="product-images-edit" multiple accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                            <div class="w-full h-full border-dashed border-2 border-slate-200 rounded-xl flex items-center justify-center group-hover:border-[#00A3A2] group-hover:bg-[#00A3A2]/5 transition-all bg-white/50">
                                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-[#00A3A2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hidden container for deleted existing images -->
                <div id="deleted-images-inputs"></div>
                
                <p class="mt-4 text-[10px] text-slate-400 font-medium italic">Vous pouvez gérer jusqu'à 3 visuels par produit.</p>
            </div>
        </div>

        <script>
            let newSelectedFiles = [];

            // Existing Images Deletion
            function markForDeletion(btn) {
                const imgContainer = btn.closest('.existing-item');
                const path = imgContainer.dataset.path;
                
                // Add hidden input
                const hiddenInputs = document.getElementById('deleted-images-inputs');
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'deleted_images[]';
                input.value = path;
                hiddenInputs.appendChild(input);
                
                // Remove from UI
                imgContainer.remove();
                
                // Show dropzone if space became available
                updateDropzoneVisibility();
            }

            // New Images Logic
            document.getElementById('product-images-edit').addEventListener('change', function(e) {
                const newFiles = Array.from(this.files);
                const currentTotal = document.querySelectorAll('#gallery-grid > div:not(#dropzone-container)').length;
                const spaceLeft = 3 - currentTotal;
                
                if (spaceLeft > 0) {
                    newSelectedFiles = [...newSelectedFiles, ...newFiles.slice(0, spaceLeft)];
                    renderGallery();
                    updateEditFileInput();
                }
            });

            function renderGallery() {
                const grid = document.getElementById('gallery-grid');
                const dropzone = document.getElementById('dropzone-container');
                
                // Clear ONLY new previews
                const newPreviews = grid.querySelectorAll('.new-preview-item');
                newPreviews.forEach(p => p.remove());

                // Create and insert new previews
                newSelectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const div = document.createElement('div');
                        div.className = 'new-preview-item relative w-20 h-20 group/item';
                        div.innerHTML = `
                            <img src="${event.target.result}" class="w-full h-full object-cover rounded-xl border-2 border-[#00A3A2]/20 shadow-sm">
                            <button type="button" onclick="removeNewFile(${index})" 
                                    class="absolute -top-1.5 -right-1.5 w-6 h-6 bg-red-500 text-white rounded-lg flex items-center justify-center transition-all hover:bg-red-600 z-30 shadow-md">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        `;
                        // Insert BEFORE the dropzone
                        grid.insertBefore(div, dropzone);
                    };
                    reader.readAsDataURL(file);
                });

                updateDropzoneVisibility();
            }

            function updateDropzoneVisibility() {
                const dropzone = document.getElementById('dropzone-container');
                const totalImages = document.querySelectorAll('#gallery-grid > div:not(#dropzone-container)').length;
                
                if (totalImages >= 3) {
                    dropzone.classList.add('hidden');
                } else {
                    dropzone.classList.remove('hidden');
                }
            }

            function removeNewFile(index) {
                newSelectedFiles.splice(index, 1);
                renderGallery();
                updateEditFileInput();
            }

            function updateEditFileInput() {
                const fileInput = document.getElementById('product-images-edit');
                const dataTransfer = new DataTransfer();
                newSelectedFiles.forEach(file => dataTransfer.items.add(file));
                fileInput.files = dataTransfer.files;
            }
        </script>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-10 border-t border-slate-100">
            <p class="text-[10px] text-slate-400 font-medium italic order-2 sm:order-1">Dernière mise à jour : {{ $product->updated_at->format('d/m/Y H:i') }}</p>
            <div class="flex flex-col-reverse sm:flex-row items-center gap-4 w-full sm:w-auto order-1 sm:order-2">
                <a href="{{ route('admin.products.index') }}" class="w-full sm:w-auto text-center px-8 py-3 text-sm font-extrabold text-slate-400 hover:text-slate-600 transition-all uppercase tracking-widest">
                    Annuler
                </a>
                <button type="submit" class="w-full sm:w-auto btn-primary px-12 py-4 h-auto text-sm uppercase tracking-widest shadow-xl shadow-[#00A3A2]/20">
                    Mettre à jour l'article
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
