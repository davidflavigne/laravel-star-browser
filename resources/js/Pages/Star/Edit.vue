<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref,reactive, toRefs } from 'vue';
import { axioss } from 'axios';

const props = defineProps<{
    star: Object;
}>();
const inStar = reactive({
    nom: props.star?props.star.nom:'',
    prenom: props.star?props.star.prenom:'',
    description: props.star?props.star.description:''
});

const onSubmit = ()=>{
    if(props.star) axios.patch('http://localhost:8000/api/star/'+props.star.id+'/update',inStar);
    else axios.post('http://localhost:8000/api/star/save',inStar)
}

</script>

<template>
    <Head title="Dashboard" />
    <GuestLayout>
        <form v-on:submit.prevent="onSubmit">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">{{ star?('Modifier '+star.nom+' '+star.prenom):'Nouvelle Star' }}</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input 
                                        type="text" 
                                        name="nom" 
                                        id="nom" 
                                        v-model="inStar.nom"
                                        autocomplete="nom" 
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                        placeholder="Nom"/>
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">Prénom</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input 
                                        type="text" 
                                        name="prenom" 
                                        id="prenom" 
                                        v-model="inStar.prenom"
                                        autocomplete="prenom" 
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                        placeholder="Prénom"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                            <textarea 
                                id="description" 
                                name="description" 
                                v-model="inStar.description"
                                rows="3" 
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                                placeholder="">
                            </textarea>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="photo" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Téléverser un fichier</span>
                                        <input id="photo" name="photo" type="file" class="sr-only" />
                                    </label>
                                    <p class="pl-1">ou glisser-déposer</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF jusqu'à 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enregistrer</button>
            </div>
        </form>

    </GuestLayout>
</template> 