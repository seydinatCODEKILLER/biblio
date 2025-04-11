<div class="px-3 mt-5">
    <div class="p-3 bg-white">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
            <?php foreach ($data["oeuvres"] as $oeuvre): ?>
                <div class="group relative overflow-hidden rounded-2xl bg-white shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <!-- Image avec effet de zoom au survol -->
                    <figure class="overflow-hidden">
                        <img
                            src="<?= htmlspecialchars($oeuvre['image_couverture']) ?>"
                            alt="Couverture de <?= htmlspecialchars($oeuvre['titre']) ?>"
                            class="h-64 w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                        <!-- Badge pour le code -->
                        <span class="absolute top-3 right-3 bg-primary/90 text-white text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm">
                            <?= $oeuvre['code'] ?>
                        </span>
                    </figure>

                    <!-- Contenu de la carte -->
                    <div class="p-5">
                        <div class="mb-3">
                            <h2 class="text-xl font-bold text-gray-800 line-clamp-1"><?= htmlspecialchars($oeuvre['titre']) ?></h2>
                            <div class="flex items-center gap-2 text-sm text-gray-500 mt-1">
                                <span><?= $oeuvre["date_edition"] ?></span>
                                <span>•</span>
                                <span class="uppercase"><?= $oeuvre["langue"] ?></span>
                            </div>
                        </div>

                        <!-- Bouton avec effet moderne -->
                        <div class="mt-4">
                            <a
                                href="oeuvre.php?id=<?= $oeuvre['id'] ?>"
                                class="btn btn-primary">
                                Voir plus
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>