<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { axioss } from 'axios';

defineProps<{
    stars: Array;
}>();

const selected = ref('star-0');
const selected_ind = ref(0);

const onAdd = ()=>{
    window.location.href = 'http://localhost:8000/star/create'
}
const onModify = (index)=>{
    window.location.href = 'http://localhost:8000/star/'+index+'/edit'
}
const onDelete = (index)=>{
    axios.delete('http://localhost:8000/api/star/'+index).then(()=>{
        window.location.href = 'http://localhost:8000/dashboard'
    });

}

</script>

<template>
    <Head title="Dashboard" />
    <GuestLayout :imagePath="stars[selected_ind].imagePath">
        <div class="w-full">
            <div class="relative right-0">
                <ul class="relative flex flex-wrap p-1 list-none rounded-lg bg-blue-gray-50/60" data-tabs="tabs" role="list">
                    <li v-for="(star,index) in stars" class="z-30 flex-auto text-center">
                        <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit hover:bg-amber-100 active:bg-amber-700"
                            data-tab-target="" 
                            role="tab" 
                            :active="selected=='star-'+index"
                            :aria-controls="'star-'+index" 
                            @click="selected='star-'+index; selected_ind=index">
                        <span class="ml-1">{{star.nom}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div> 
        <div id="default-tab-content" data-tab-content="" class="w-full"> 
            <div v-for="(star,index) in stars" 
                :class="{hidden: selected!='star-'+index}" 
                class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 flex flex-col justify-center" 
                :id="'star-'+index" 
                role="tabpanel">
                <span class="ml-1 my-8 text-center">{{star.prenom}} {{star.nom}}</span>
                <p class="text-sm text-gray-500 dark:text-gray-400 text-justify">{{star.description}}</p>
                <div class="w-full flex flex-row justify-evenly my-8">
                    <button 
                        type="button" 
                        @click="onAdd" 
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Ajouter
                    </button>    
                    <button 
                        type="button" 
                        @click="onModify(star.id)" 
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Modifier
                    </button>
                    <button 
                        type="button" 
                        @click="onDelete(star.id)" 
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template> 