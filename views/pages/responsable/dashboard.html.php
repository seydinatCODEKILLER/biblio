<div class="px-3">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mt-5">
        <div
            class="p-3 rounded bg-white shadow-sm flex flex-col gap-2 relative transition-transform duration-300 hover:scale-105 cursor-pointer">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded bg-blue-50 flex justify-center items-center cursor-pointer">
                    <i class="ri-group-3-line text-blue-500 font-medium"></i>
                </div>
                <p class="text-blue-500 font-medium text-lg">Auteurs</p>
            </div>
            <div>
                <p class="font-medium text-5xl" id="totalPatients"><?= $total_auteurs ?></p>
                <span class="text-gray-400 font-medium">Total de vos auteurs</span>
            </div>
            <div
                class="w-12 h-12 rounded-full bg-blue-50 flex justify-center items-center cursor-pointer absolute top-2 right-2">
                <i class="ri-arrow-right-up-box-line text-xl"></i>
            </div>
        </div>
        <div
            class="p-3 rounded bg-white shadow-sm flex flex-col gap-2 relative transition-transform duration-300 hover:scale-105 cursor-pointer">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded bg-orange-50 flex justify-center items-center cursor-pointer">
                    <i class="ri-calendar-line text-orange-500 font-medium"></i>
                </div>
                <p class="text-orange-500 font-medium text-lg">Rayons</p>
            </div>
            <div>
                <p class="font-medium text-5xl" id="totalAppointments"><?= $total_rayons ?></p>
                <span class="text-gray-400 font-medium">Total de vos rayons</span>
            </div>
            <div
                class="w-12 h-12 rounded-full bg-orange-50 flex justify-center items-center cursor-pointer absolute top-2 right-2">
                <i class="ri-arrow-right-up-box-line text-xl"></i>
            </div>
        </div>
        <div
            class="p-3 rounded bg-white shadow-sm flex flex-col gap-2 relative transition-transform duration-300 hover:scale-105 cursor-pointer">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded bg-green-50 flex justify-center items-center cursor-pointer">
                    <i class="ri-history-line text-green-500 font-medium"></i>
                </div>
                <p class="text-green-500 font-medium text-lg">
                    Exemplaires
                </p>
            </div>
            <div>
                <p class="font-medium text-5xl" id="pendingAppointments"><?= $total_exemplaires ?></p>
                <span class="text-gray-400 font-medium">Total de vos exemplaires</span>
            </div>
            <div
                class="w-12 h-12 rounded-full bg-green-50 flex justify-center items-center cursor-pointer absolute top-2 right-2">
                <i class="ri-arrow-right-up-box-line text-xl"></i>
            </div>
        </div>
        <div
            class="p-3 rounded bg-white shadow-sm flex flex-col gap-2 relative transition-transform duration-300 hover:scale-105 cursor-pointer">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded bg-green-50 flex justify-center items-center cursor-pointer">
                    <i class="ri-history-line text-green-500 font-medium"></i>
                </div>
                <p class="text-green-500 font-medium text-lg">
                    Ouvrages
                </p>
            </div>
            <div>
                <p class="font-medium text-5xl" id="pendingAppointments"><?= $total_ouvrages ?></p>
                <span class="text-gray-400 font-medium">Total de vos ouvrages</span>
            </div>
            <div
                class="w-12 h-12 rounded-full bg-green-50 flex justify-center items-center cursor-pointer absolute top-2 right-2">
                <i class="ri-arrow-right-up-box-line text-xl"></i>
            </div>
        </div>
    </div>
</div>