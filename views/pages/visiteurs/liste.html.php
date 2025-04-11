<main class="container mx-auto px-4 py-5 gap-4 flex">
    <form
        method="get"
        class="hidden lg:flex flex-col gap-3 bg-white shadow-md rounded w-1/4 p-4 h-fit sticky top-20">
        <input type="hidden" name="controllers" value="public">
        <input type="hidden" name="page" value="liste">
        <!-- Auteurs -->
        <div class="mb-2">
            <h3 class="font-medium text-gray-700 mb-3 flex items-center">
                <i class="fas fa-user-edit mr-2 text-indigo-400"></i>
                Auteurs
            </h3>
            <select
                name="auteur_id"
                class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option>Tous les auteurs</option>
                <?php foreach ($auteurs as $auteur): ?>
                    <option value="<?= $auteur["id"] ?>"><?= $auteur["nom"] ?> <?= $auteur["prenom"] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Rayons -->
        <div class="mb-2">
            <h3 class="font-medium text-gray-700 mb-3 flex items-center">
                <i class="fas fa-user-edit mr-2 text-indigo-400"></i>
                Rayons
            </h3>
            <select
                name="rayon_id"
                class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Tous les rayons</option>
                <?php foreach ($rayons["data"] as $rayon): ?>
                    <option value="<?= $rayon["id"] ?>"><?= $rayon["nom"] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Date de publication -->
        <div class="mb-3">
            <h3 class="font-medium text-gray-700 mb-3 flex items-center">
                <i class="fas fa-calendar-alt mr-2 text-indigo-400"></i>
                Année de publication
            </h3>
            <div class="flex items-center space-x-2">
                <input
                    type="number"
                    placeholder="De"
                    class="w-1/2 p-2 border border-gray-300 rounded-md" />
                <input
                    type="number"
                    placeholder="À"
                    class="w-1/2 p-2 border border-gray-300 rounded-md" />
            </div>
        </div>
        <button type="submit" class="btn btn-active btn-primary">
            Appliquer les filtres
        </button>
    </form>
    <div class="w-3/4 w-full">
        <div class="flex justify-between items-center mb-6 bg-white py-2 px-4 shadow-sm">
            <h2 class="hidden md:block font-bold text-gray-800">
                <i class="fas fa-book mr-2 text-indigo-500"></i>
                Catalogue des livres
            </h2>
            <form class="flex items-center gap-3">
                <input type="hidden" name="controllers" value="public">
                <input type="hidden" name="page" value="liste">
                <div class="relative">
                    <input
                        type="text"
                        name="search"
                        placeholder="Rechercher un livre..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <button class="btn btn-outline">Filtrez</button>
            </form>
        </div>
        <!-- Liste des oeuvres en cartes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 mb-3">
            <?php foreach ($ouvrages as $ouvrage): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Image de couverture -->
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <?php if ($ouvrage['image_couverture']): ?>
                            <img src="<?= htmlspecialchars($ouvrage['image_couverture']) ?>" alt="Couverture de <?= htmlspecialchars($ouvrage['titre']) ?>" class="h-full w-full object-cover">
                        <?php else: ?>
                            <i class="ri-book-2-line text-5xl text-gray-400"></i>
                        <?php endif; ?>
                    </div>

                    <!-- Contenu de la carte -->
                    <div class="p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-medium text-md text-gray-500 mb-1"><?= htmlspecialchars($ouvrage['titre']) ?></h3>
                                <p class="text-sm text-gray-600 mb-1">
                                    <i class="ri-user-line"></i> <?= htmlspecialchars($ouvrage['auteurs'] ?? 'Auteur inconnu') ?>
                                </p>
                                <p class="text-sm text-gray-600 mb-1">
                                    <i class="ri-bookmark-line"></i> <?= htmlspecialchars($ouvrage['rayon']) ?>
                                </p>
                            </div>

                            <!-- Menu options -->
                            <div class="dropdown dropdown-end">
                                <button type="button" tabindex="0" class="btn btn-ghost btn-sm">
                                    <i class="ri-more-2-fill text-gray-400 hover:text-gray-600"></i>
                                </button>
                                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-white rounded-box w-40 mt-1">
                                    <li>
                                        <a href="<?= ROOT_URL ?>?controllers=public&page=liste&details_ouvrage_id=<?= $ouvrage['id'] ?>"
                                            class="text-gray-700 hover:bg-gray-100">
                                            <i class="ri-eye-line text-gray-400"></i>
                                            Détails
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Mots-clés -->
                        <?php if (!empty($ouvrage['mots_cles'])): ?>
                            <div class="mt-2 flex flex-wrap gap-1">
                                <?php foreach (explode(',', $ouvrage['mots_cles']) as $mot): ?>
                                    <span class="badge badge-soft badge-primary text-xs"><?= trim(htmlspecialchars($mot)) ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Pagination -->
        <?= renderPagination($paginations, array_merge(['controllers' => 'public', 'page' => 'liste'])) ?>
    </div>

    </div>
    <dialog id="addRegisterModal" class="modal">
        <div class="modal-box w-full w-96">
            <h3 class="font-medium text-md text-gray-600">
                veuillez renseignez vos identifiants
            </h3>
            <form method="POST" action="" class="mt-4 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Informations personnelles -->
                    <div class="space-y-4">
                        <div class="form-control">
                            <label class="label font-medium">Nom</label>
                            <input
                                type="text"
                                name="nom"
                                value=""
                                class="input input-bordered w-full" />
                        </div>
                        <div class="form-control">
                            <label class="label font-medium">Prénom</label>
                            <input
                                type="text"
                                name="prenom"
                                value=""
                                class="input input-bordered w-full" />
                        </div>

                        <div class="form-control">
                            <label class="label font-medium">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="input input-bordered w-full" />
                        </div>

                        <div class="form-control">
                            <label class="label font-medium">Téléphone</label>
                            <input
                                type="text"
                                name="telephone"
                                class="input input-bordered w-full" />
                        </div>

                        <div class="form-control">
                            <label class="label font-medium">Mot de passe</label>
                            <input
                                type="password"
                                name="password"
                                class="input input-bordered w-full" />
                        </div>
                    </div>
                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary w-full">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</main>